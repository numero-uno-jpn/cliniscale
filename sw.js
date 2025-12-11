// Service Worker for ClinicalScale Application
const CACHE_VERSION = "cliniscale-v1.5.0"; // ClientApp.php のバージョンと同期させること！
const STATIC_CACHE = `${CACHE_VERSION}-static`;
const DYNAMIC_CACHE = `${CACHE_VERSION}-dynamic`;
const API_CACHE = `${CACHE_VERSION}-api`;

// キャッシュする静的ファイル（相対パス + 実際に存在するファイルのみ）
const STATIC_FILES = [
  "./",
  "./index.php",
  "./client-app.css",
  // 画像ファイル
  "./img/favicon.ico",
  "./img/favicon.svg",
  "./img/favicon-96x96.png",
  "./img/apple-touch-icon.png",
  "./img/web-app-manifest-192x192.png",
  "./img/web-app-manifest-512x512.png",
  "./img/site.webmanifest",
  // CDNファイル（これらは常にアクセス可能）
  "https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css",
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css",
  "https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js",
  "https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js",
  "https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js",
  "https://cdn.jsdelivr.net/npm/marked/marked.min.js",
  "https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css",
  "https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js",
  "https://fonts.googleapis.com/css2?family=BIZ+UDPGothic:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap",
];

// インストール時（改善版: 失敗してもスキップ）
self.addEventListener("install", (event) => {
  console.log("[SW] Installing Service Worker...", CACHE_VERSION);

  event.waitUntil(
    caches
      .open(STATIC_CACHE)
      .then(async (cache) => {
        // console.log("[SW] Caching static files");

        // 個別にキャッシュして、失敗したものはスキップ
        const cachePromises = STATIC_FILES.map(async (url) => {
          try {
            await cache.add(url);
            // console.log(`[SW] Cached: ${url}`);
          } catch (error) {
            console.warn(`[SW] Failed to cache: ${url}`, error.message);
            // エラーが出てもスキップして続行
          }
        });

        return Promise.allSettled(cachePromises);
      })
      .then(() => {
        console.log("[SW] Installation complete");
      })
      .catch((error) => {
        console.error("[SW] Installation failed:", error);
      })
  );

  // 新しいService Workerを即座にアクティブ化
  self.skipWaiting();
});

// アクティベート時（古いキャッシュを削除）
self.addEventListener("activate", (event) => {
  console.log("[SW] Activating Service Worker...", CACHE_VERSION);

  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheName.startsWith(CACHE_VERSION)) {
            console.log("[SW] Deleting old cache:", cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );

  // すべてのクライアントを制御下に置く
  return self.clients.claim();
});

// フェッチ時（キャッシュ戦略）
self.addEventListener("fetch", (event) => {
  const { request } = event;

  // URL の解析
  let url;
  try {
    url = new URL(request.url);
  } catch (error) {
    // 不正なURLは無視
    console.warn("[SW] Invalid URL:", request.url);
    return;
  }

  // POST リクエストはキャッシュしない
  if (request.method !== "GET") {
    return;
  }

  // ブラウザ拡張機能のリクエストは除外
  if (
    url.protocol === "chrome-extension:" ||
    url.protocol === "moz-extension:" ||
    url.protocol === "safari-extension:"
  ) {
    return;
  }

  // API リクエストの処理
  if (url.origin === "https://api.emuyn.net") {
    event.respondWith(networkFirstStrategy(request, API_CACHE));
    return;
  }

  // 静的ファイルの処理
  event.respondWith(cacheFirstStrategy(request));
});

// Cache First 戦略（静的ファイル用）
async function cacheFirstStrategy(request) {
  try {
    // まずキャッシュを確認
    const cachedResponse = await caches.match(request);
    if (cachedResponse) {
      return cachedResponse;
    }

    // キャッシュになければネットワークから取得
    const networkResponse = await fetch(request);

    // 成功したレスポンスのみキャッシュ
    if (networkResponse && networkResponse.status === 200) {
      const cache = await caches.open(DYNAMIC_CACHE);
      // クローンして保存（レスポンスは一度しか読めないため）
      cache.put(request, networkResponse.clone());
    }

    return networkResponse;
  } catch (error) {
    console.error("[SW] Fetch failed:", error);

    // オフライン時のフォールバック
    const cachedResponse = await caches.match(request);
    if (cachedResponse) {
      return cachedResponse;
    }

    // どちらも失敗した場合
    return new Response(
      JSON.stringify({
        error: "オフラインです",
        message: "ネットワーク接続を確認してください",
      }),
      {
        headers: { "Content-Type": "application/json" },
        status: 503,
      }
    );
  }
}

// Network First 戦略（API用）
async function networkFirstStrategy(request, cacheName) {
  try {
    // まずネットワークから取得を試みる
    const networkResponse = await fetch(request);

    // 成功したらキャッシュに保存
    if (networkResponse && networkResponse.status === 200) {
      const cache = await caches.open(cacheName);
      cache.put(request, networkResponse.clone());
    }

    return networkResponse;
  } catch (error) {
    console.warn("[SW] Network failed, trying cache:", error);

    // ネットワークが失敗したらキャッシュから取得
    const cachedResponse = await caches.match(request);
    if (cachedResponse) {
      return cachedResponse;
    }

    // キャッシュもなければエラーレスポンス
    return new Response(
      JSON.stringify({
        error: "データを取得できませんでした",
        message: "オフラインで、キャッシュも利用できません",
      }),
      {
        headers: { "Content-Type": "application/json" },
        status: 503,
      }
    );
  }
}

// メッセージハンドラ（キャッシュのクリアなど）
self.addEventListener("message", (event) => {
  if (event.data && event.data.type === "SKIP_WAITING") {
    self.skipWaiting();
  }

  if (event.data && event.data.type === "CLEAR_CACHE") {
    event.waitUntil(
      caches
        .keys()
        .then((cacheNames) => {
          return Promise.all(
            cacheNames.map((cacheName) => caches.delete(cacheName))
          );
        })
        .then(() => {
          console.log("[SW] All caches cleared");
          if (event.ports && event.ports[0]) {
            event.ports[0].postMessage({ success: true });
          }
        })
    );
  }
});

// 定期的なバックグラウンド同期（オプション）
self.addEventListener("sync", (event) => {
  if (event.tag === "sync-questionnaires") {
    event.waitUntil(syncQuestionnaires());
  }
});

// 問診票データの同期
async function syncQuestionnaires() {
  const url =
    "https://api.emuyn.net/getYaml.php?filename=emuyn/cliniscale/スコア票リスト.yaml";

  try {
    const response = await fetch(url);
    const data = await response.json();

    const cache = await caches.open(API_CACHE);
    cache.put(url, new Response(JSON.stringify(data)));

    console.log("[SW] Questionnaires synced");
  } catch (error) {
    console.error("[SW] Sync failed:", error);
  }
}

// プッシュ通知（将来の拡張用）
self.addEventListener("push", (event) => {
  if (!event.data) return;

  const data = event.data.json();
  const title = data.title || "ClinicalScale";
  const options = {
    body: data.body || "新しい通知があります",
    icon: "./img/favicon-96x96.png",
    badge: "./img/badge-72x72.png",
    vibrate: [200, 100, 200],
    data: data.data || {},
  };

  event.waitUntil(self.registration.showNotification(title, options));
});

// 通知クリック時
self.addEventListener("notificationclick", (event) => {
  event.notification.close();

  event.waitUntil(clients.openWindow(event.notification.data.url || "./"));
});

console.log("[SW] Service Worker loaded:", CACHE_VERSION);
