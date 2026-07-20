# Reference
<details><summary><code>$client-&gt;crawl($request) -> ?JobCreatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->crawl(
    new CrawlDto([
        'url' => 'https://example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$allowExternalLinks:** `?bool` — Whether to allow crawling external domains
    
</dd>
</dl>

<dl>
<dd>

**$allowSubdomains:** `?bool` — Whether to allow crawling subdomains
    
</dd>
</dl>

<dl>
<dd>

**$crawlEntireDomain:** `?bool` — Whether to crawl entire domain or just subtree
    
</dd>
</dl>

<dl>
<dd>

**$deduplicateSimilarUrLs:** `?bool` — Deduplicate similar URLs using intelligent matching
    
</dd>
</dl>

<dl>
<dd>

**$delay:** `?float` — Delay between page scrapes in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$excludePaths:** `?array` — Regex patterns to exclude paths
    
</dd>
</dl>

<dl>
<dd>

**$ignoreQueryParameters:** `?bool` — Ignore query parameters when deduplicating URLs
    
</dd>
</dl>

<dl>
<dd>

**$includePaths:** `?array` — Regex patterns to include paths
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of pages to crawl
    
</dd>
</dl>

<dl>
<dd>

**$maxConcurrency:** `?float` — Maximum number of concurrent scrapes for this crawl
    
</dd>
</dl>

<dl>
<dd>

**$maxDiscoveryDepth:** `?float` — Maximum depth for URL discovery
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `?string` — Natural language instructions for crawl configuration
    
</dd>
</dl>

<dl>
<dd>

**$scrapeOptions:** `?array` — Scrape options to apply to each page. actions accepts at most 25 bounded browser actions. zeroDataRetention: true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED.
    
</dd>
</dl>

<dl>
<dd>

**$sitemap:** `?string` — Sitemap handling strategy
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — Starting URL to crawl
    
</dd>
</dl>

<dl>
<dd>

**$webhook:** `?WebhookConfigDto` — Webhook configuration
    
</dd>
</dl>

<dl>
<dd>

**$zeroDataRetention:** `?bool` — Reserved for a future zero-data-retention mode. true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED; omit or use false.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;extract($request) -> ?JobCreatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->extract(
    new ExtractDto([
        'prompt' => 'Extract all product names, prices, and descriptions from these pages',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$agent:** `?AgentConfigDto` — Agent configuration
    
</dd>
</dl>

<dl>
<dd>

**$enableWebSearch:** `?bool` — Enable web search for URL discovery
    
</dd>
</dl>

<dl>
<dd>

**$ignoreInvalidUrLs:** `?bool` — Ignore invalid URLs and process remaining valid ones
    
</dd>
</dl>

<dl>
<dd>

**$ignoreSitemap:** `?bool` — Ignore sitemap during URL discovery
    
</dd>
</dl>

<dl>
<dd>

**$includeSubdomains:** `?bool` — Include subdomains in extraction
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `string` — Natural language prompt describing what to extract. Maximum 16384 UTF-8 bytes.
    
</dd>
</dl>

<dl>
<dd>

**$schema:** `?array` — JSON Schema for structured output. Serialized schema is limited to 65536 UTF-8 bytes.
    
</dd>
</dl>

<dl>
<dd>

**$scrapeOptions:** `?array` — Scrape options for each URL. zeroDataRetention: true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED.
    
</dd>
</dl>

<dl>
<dd>

**$showSources:** `?bool` — Include source citations in response
    
</dd>
</dl>

<dl>
<dd>

**$urls:** `?array` — 1–20 unique public HTTP(S) URLs. May be omitted only when enableWebSearch is true. Each URL is limited to 2048 UTF-8 bytes.
    
</dd>
</dl>

<dl>
<dd>

**$webhook:** `?ExtractWebhookConfigDto` — Webhook configuration
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;map($request) -> ?MapResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->map(
    new MapDto([
        'url' => 'https://example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ignoreQueryParameters:** `?bool` — Ignore query parameters when discovering URLs
    
</dd>
</dl>

<dl>
<dd>

**$includeSubdomains:** `?bool` — Include subdomains in the map
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of URLs to return
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?LocationDto` — Location configuration
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search filter for URLs
    
</dd>
</dl>

<dl>
<dd>

**$sitemap:** `?string` — How to handle sitemaps
    
</dd>
</dl>

<dl>
<dd>

**$timeout:** `?float` — Timeout for map operation in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — URL to map
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;parse($request) -> ?ScrapeResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->parse(
    new ParseDto([
        'url' => 'https://example.com/report.pdf',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$timeout:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — Public PDF, Word document, or spreadsheet URL
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;scrape($request) -> ?ScrapeResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->scrape(
    new ScrapeDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$actions:** `?array` — Browser actions to execute
    
</dd>
</dl>

<dl>
<dd>

**$blockAds:** `?bool` — Enable ad-blocking and cookie popup blocking
    
</dd>
</dl>

<dl>
<dd>

**$domain:** `?string` — Domain to scrape. Normalized to https://domain when url is omitted.
    
</dd>
</dl>

<dl>
<dd>

**$excludeTags:** `?array` — CSS selectors to exclude
    
</dd>
</dl>

<dl>
<dd>

**$extractionSchema:** `?array` — Schema for structured data extraction (used with json format)
    
</dd>
</dl>

<dl>
<dd>

**$formats:** `?array` — Output formats - can be simple strings or format objects with options
    
</dd>
</dl>

<dl>
<dd>

**$headers:** `?array` — Custom headers
    
</dd>
</dl>

<dl>
<dd>

**$includeTags:** `?array` — CSS selectors to include
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?LocationDto` — Location settings
    
</dd>
</dl>

<dl>
<dd>

**$maxAge:** `?float` — Cache max age in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$mobile:** `?bool` — Emulate mobile device for scraping
    
</dd>
</dl>

<dl>
<dd>

**$onlyMainContent:** `?bool` — Extract only main content
    
</dd>
</dl>

<dl>
<dd>

**$proxy:** `?string` — Proxy mode. auto starts direct and escalates only when blocked. basic is an alias for none.
    
</dd>
</dl>

<dl>
<dd>

**$removeBase64Images:** `?bool` — Remove base64 images from output (keeps alt text)
    
</dd>
</dl>

<dl>
<dd>

**$screenshotAsBase64:** `?bool` — Return screenshot/PDF output inline as a base64 data URL instead of an uploaded CDN URL. Default false (a CDN URL is returned).
    
</dd>
</dl>

<dl>
<dd>

**$skipTlsVerification:** `?bool` — Skip TLS certificate verification
    
</dd>
</dl>

<dl>
<dd>

**$storeInCache:** `?bool` — Store result in cache
    
</dd>
</dl>

<dl>
<dd>

**$timeout:** `?float` — Request timeout in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — URL to scrape. Either url or domain is required.
    
</dd>
</dl>

<dl>
<dd>

**$waitFor:** `?float` — Wait time before scraping (ms)
    
</dd>
</dl>

<dl>
<dd>

**$zeroDataRetention:** `?bool` — Reserved for a future zero-data-retention mode. true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED; omit or use false.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;screenshot($request) -> ?ScrapeResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cookie banners, blocking overlays, chat widgets, and lazy loading are handled by default. Every cleanup pass can be controlled per request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->screenshot(
    new ScreenshotDto([
        'url' => 'https://example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blockAds:** `?bool` — Block common advertising and analytics requests
    
</dd>
</dl>

<dl>
<dd>

**$clickSelector:** `?string` — Click this CSS selector before capture
    
</dd>
</dl>

<dl>
<dd>

**$clip:** `?ScreenshotClipDto` — Capture an exact pixel rectangle instead of the page
    
</dd>
</dl>

<dl>
<dd>

**$colorScheme:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$cookies:** `?array` — Cookies to set before loading the page
    
</dd>
</dl>

<dl>
<dd>

**$delay:** `?float` — Extra settling time after the page is ready, in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$device:** `?string` — Named viewport preset
    
</dd>
</dl>

<dl>
<dd>

**$disableAnimations:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$format:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$fullPage:** `?bool` — Capture the complete page instead of only the viewport
    
</dd>
</dl>

<dl>
<dd>

**$fullPageAlgorithm:** `?string` — auto uses native capture for normal pages and stitched slices for very tall pages
    
</dd>
</dl>

<dl>
<dd>

**$headers:** `?array` — Headers sent while loading the page
    
</dd>
</dl>

<dl>
<dd>

**$hideFixedElements:** `?bool` — Show fixed/sticky UI once instead of repeating it in stitched captures
    
</dd>
</dl>

<dl>
<dd>

**$hideSelectors:** `?array` — Hide matching elements before capture
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?ScreenshotLocationDto` 
    
</dd>
</dl>

<dl>
<dd>

**$maskColor:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maskSelectors:** `?array` — Cover matching elements with a solid privacy mask
    
</dd>
</dl>

<dl>
<dd>

**$maxHeight:** `?float` — Maximum full-page height. Prevents endless captures on infinite pages.
    
</dd>
</dl>

<dl>
<dd>

**$omitBackground:** `?bool` — Use a transparent background where the page allows it
    
</dd>
</dl>

<dl>
<dd>

**$proxy:** `?string` — Proxy mode
    
</dd>
</dl>

<dl>
<dd>

**$quality:** `?float` — JPEG or WebP quality
    
</dd>
</dl>

<dl>
<dd>

**$reducedMotion:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$removeChatWidgets:** `?bool` — Hide common support and chat widgets
    
</dd>
</dl>

<dl>
<dd>

**$removeCookieBanners:** `?bool` — Accept known consent dialogs, hide remaining cookie banners, and restore page scrolling
    
</dd>
</dl>

<dl>
<dd>

**$removeOverlays:** `?bool` — Remove newsletter gates, modal backdrops, and blocking overlays
    
</dd>
</dl>

<dl>
<dd>

**$responseFormat:** `?string` — Return a CDN URL or an inline data URL
    
</dd>
</dl>

<dl>
<dd>

**$scale:** `?string` — Capture at CSS pixel size or the emulated device pixel ratio
    
</dd>
</dl>

<dl>
<dd>

**$scrollDelay:** `?float` — Pause between lazy-load scroll steps, in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$scrollPage:** `?bool` — Scroll through the page first so lazy content is loaded
    
</dd>
</dl>

<dl>
<dd>

**$selector:** `?string` — Capture one element instead of the page
    
</dd>
</dl>

<dl>
<dd>

**$styles:** `?array` — CSS rules to apply before capture
    
</dd>
</dl>

<dl>
<dd>

**$timeout:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — Public webpage URL to capture
    
</dd>
</dl>

<dl>
<dd>

**$viewport:** `?ScreenshotViewportDto` — Custom viewport. Overrides the named device dimensions.
    
</dd>
</dl>

<dl>
<dd>

**$waitForSelector:** `?string` — Wait for this CSS selector before capture
    
</dd>
</dl>

<dl>
<dd>

**$waitUntil:** `?string` — Page readiness milestone used before capture
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;search($request) -> ?SearchResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->search(
    new SearchDto([
        'query' => 'machine learning tutorials',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$categories:** `?array` — Category filters
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` — Country code
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results
    
</dd>
</dl>

<dl>
<dd>

**$location:** `?string` — Location for geo-targeting
    
</dd>
</dl>

<dl>
<dd>

**$query:** `string` — Search query
    
</dd>
</dl>

<dl>
<dd>

**$sources:** `?array` — Source types to search
    
</dd>
</dl>

<dl>
<dd>

**$tbs:** `?string` — Time-based filter (e.g., qdr:d for past day)
    
</dd>
</dl>

<dl>
<dd>

**$timeout:** `?float` — Timeout for search operation in milliseconds
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Account
<details><summary><code>$client-&gt;account-&gt;get() -> ?AccountResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Brand
<details><summary><code>$client-&gt;brand-&gt;retrieve($request) -> ?BrandResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send one website URL. BerryCrawl returns the brand identity found on that site.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->brand->retrieve(
    new BrandDto([
        'url' => 'https://stripe.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$refresh:** `?bool` — Ignore a cached profile and fetch the website again
    
</dd>
</dl>

<dl>
<dd>

**$timeout:** `?float` — Maximum time to spend building the profile, in milliseconds
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The public website whose brand profile should be extracted
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Jobs
<details><summary><code>$client-&gt;jobs-&gt;list($request) -> ?ListJobsResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->jobs->list(
    new ListJobsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;jobs-&gt;get($id, $request) -> ?JobResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->jobs->get(
    'id',
    new GetJobsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;jobs-&gt;cancel($id) -> ?CancelJobResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->jobs->cancel(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhooks
<details><summary><code>$client-&gt;webhooks-&gt;list() -> ?ListWebhooksResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;create($request) -> ?WebhookResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->create(
    new CreateWebhookDto([
        'events' => [
            'crawl.completed',
            'extract.failed',
        ],
        'url' => 'https://api.example.com/webhooks',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$events:** `array` — Event types to subscribe to
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — Webhook URL to send events to
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;get($id) -> ?WebhookResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;delete($id) -> ?MessageResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;update($id, $request) -> ?WebhookResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->update(
    'id',
    new UpdateWebhookDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$events:** `?array` — Event types to subscribe to
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` — Enable or disable webhook
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — Webhook URL to send events to
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;test($id, $request) -> ?TestWebhookResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->test(
    'id',
    new TestWebhookDto([
        'event' => 'crawl.completed',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$event:** `string` — Event type to test
    
</dd>
</dl>

<dl>
<dd>

**$payload:** `?array` — Optional custom payload for testing
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

