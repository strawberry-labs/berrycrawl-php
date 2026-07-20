<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Types\ScreenshotClipDto;
use Berrycrawl\Types\ScreenshotDtoColorScheme;
use Berrycrawl\Types\ScreenshotCookieDto;
use Berrycrawl\Core\Types\ArrayType;
use Berrycrawl\Types\ScreenshotDtoDevice;
use Berrycrawl\Types\ScreenshotDtoFormat;
use Berrycrawl\Types\ScreenshotDtoFullPageAlgorithm;
use Berrycrawl\Types\ScreenshotLocationDto;
use Berrycrawl\Types\ScreenshotDtoProxy;
use Berrycrawl\Types\ScreenshotDtoResponseFormat;
use Berrycrawl\Types\ScreenshotDtoScale;
use Berrycrawl\Types\ScreenshotViewportDto;
use Berrycrawl\Types\ScreenshotDtoWaitUntil;

class ScreenshotDto extends JsonSerializableType
{
    /**
     * @var ?bool $blockAds Block common advertising and analytics requests
     */
    #[JsonProperty('blockAds')]
    public ?bool $blockAds;

    /**
     * @var ?string $clickSelector Click this CSS selector before capture
     */
    #[JsonProperty('clickSelector')]
    public ?string $clickSelector;

    /**
     * @var ?ScreenshotClipDto $clip Capture an exact pixel rectangle instead of the page
     */
    #[JsonProperty('clip')]
    public ?ScreenshotClipDto $clip;

    /**
     * @var ?value-of<ScreenshotDtoColorScheme> $colorScheme
     */
    #[JsonProperty('colorScheme')]
    public ?string $colorScheme;

    /**
     * @var ?array<ScreenshotCookieDto> $cookies Cookies to set before loading the page
     */
    #[JsonProperty('cookies'), ArrayType([ScreenshotCookieDto::class])]
    public ?array $cookies;

    /**
     * @var ?float $delay Extra settling time after the page is ready, in milliseconds
     */
    #[JsonProperty('delay')]
    public ?float $delay;

    /**
     * @var ?value-of<ScreenshotDtoDevice> $device Named viewport preset
     */
    #[JsonProperty('device')]
    public ?string $device;

    /**
     * @var ?bool $disableAnimations
     */
    #[JsonProperty('disableAnimations')]
    public ?bool $disableAnimations;

    /**
     * @var ?value-of<ScreenshotDtoFormat> $format
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?bool $fullPage Capture the complete page instead of only the viewport
     */
    #[JsonProperty('fullPage')]
    public ?bool $fullPage;

    /**
     * @var ?value-of<ScreenshotDtoFullPageAlgorithm> $fullPageAlgorithm auto uses native capture for normal pages and stitched slices for very tall pages
     */
    #[JsonProperty('fullPageAlgorithm')]
    public ?string $fullPageAlgorithm;

    /**
     * @var ?array<string, mixed> $headers Headers sent while loading the page
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'mixed'])]
    public ?array $headers;

    /**
     * @var ?bool $hideFixedElements Show fixed/sticky UI once instead of repeating it in stitched captures
     */
    #[JsonProperty('hideFixedElements')]
    public ?bool $hideFixedElements;

    /**
     * @var ?array<string> $hideSelectors Hide matching elements before capture
     */
    #[JsonProperty('hideSelectors'), ArrayType(['string'])]
    public ?array $hideSelectors;

    /**
     * @var ?ScreenshotLocationDto $location
     */
    #[JsonProperty('location')]
    public ?ScreenshotLocationDto $location;

    /**
     * @var ?string $maskColor
     */
    #[JsonProperty('maskColor')]
    public ?string $maskColor;

    /**
     * @var ?array<string> $maskSelectors Cover matching elements with a solid privacy mask
     */
    #[JsonProperty('maskSelectors'), ArrayType(['string'])]
    public ?array $maskSelectors;

    /**
     * @var ?float $maxHeight Maximum full-page height. Prevents endless captures on infinite pages.
     */
    #[JsonProperty('maxHeight')]
    public ?float $maxHeight;

    /**
     * @var ?bool $omitBackground Use a transparent background where the page allows it
     */
    #[JsonProperty('omitBackground')]
    public ?bool $omitBackground;

    /**
     * @var ?value-of<ScreenshotDtoProxy> $proxy Proxy mode
     */
    #[JsonProperty('proxy')]
    public ?string $proxy;

    /**
     * @var ?float $quality JPEG or WebP quality
     */
    #[JsonProperty('quality')]
    public ?float $quality;

    /**
     * @var ?bool $reducedMotion
     */
    #[JsonProperty('reducedMotion')]
    public ?bool $reducedMotion;

    /**
     * @var ?bool $removeChatWidgets Hide common support and chat widgets
     */
    #[JsonProperty('removeChatWidgets')]
    public ?bool $removeChatWidgets;

    /**
     * @var ?bool $removeCookieBanners Accept known consent dialogs, hide remaining cookie banners, and restore page scrolling
     */
    #[JsonProperty('removeCookieBanners')]
    public ?bool $removeCookieBanners;

    /**
     * @var ?bool $removeOverlays Remove newsletter gates, modal backdrops, and blocking overlays
     */
    #[JsonProperty('removeOverlays')]
    public ?bool $removeOverlays;

    /**
     * @var ?value-of<ScreenshotDtoResponseFormat> $responseFormat Return a CDN URL or an inline data URL
     */
    #[JsonProperty('responseFormat')]
    public ?string $responseFormat;

    /**
     * @var ?value-of<ScreenshotDtoScale> $scale Capture at CSS pixel size or the emulated device pixel ratio
     */
    #[JsonProperty('scale')]
    public ?string $scale;

    /**
     * @var ?float $scrollDelay Pause between lazy-load scroll steps, in milliseconds
     */
    #[JsonProperty('scrollDelay')]
    public ?float $scrollDelay;

    /**
     * @var ?bool $scrollPage Scroll through the page first so lazy content is loaded
     */
    #[JsonProperty('scrollPage')]
    public ?bool $scrollPage;

    /**
     * @var ?string $selector Capture one element instead of the page
     */
    #[JsonProperty('selector')]
    public ?string $selector;

    /**
     * @var ?array<string> $styles CSS rules to apply before capture
     */
    #[JsonProperty('styles'), ArrayType(['string'])]
    public ?array $styles;

    /**
     * @var ?float $timeout
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @var string $url Public webpage URL to capture
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?ScreenshotViewportDto $viewport Custom viewport. Overrides the named device dimensions.
     */
    #[JsonProperty('viewport')]
    public ?ScreenshotViewportDto $viewport;

    /**
     * @var ?string $waitForSelector Wait for this CSS selector before capture
     */
    #[JsonProperty('waitForSelector')]
    public ?string $waitForSelector;

    /**
     * @var ?value-of<ScreenshotDtoWaitUntil> $waitUntil Page readiness milestone used before capture
     */
    #[JsonProperty('waitUntil')]
    public ?string $waitUntil;

    /**
     * @param array{
     *   url: string,
     *   blockAds?: ?bool,
     *   clickSelector?: ?string,
     *   clip?: ?ScreenshotClipDto,
     *   colorScheme?: ?value-of<ScreenshotDtoColorScheme>,
     *   cookies?: ?array<ScreenshotCookieDto>,
     *   delay?: ?float,
     *   device?: ?value-of<ScreenshotDtoDevice>,
     *   disableAnimations?: ?bool,
     *   format?: ?value-of<ScreenshotDtoFormat>,
     *   fullPage?: ?bool,
     *   fullPageAlgorithm?: ?value-of<ScreenshotDtoFullPageAlgorithm>,
     *   headers?: ?array<string, mixed>,
     *   hideFixedElements?: ?bool,
     *   hideSelectors?: ?array<string>,
     *   location?: ?ScreenshotLocationDto,
     *   maskColor?: ?string,
     *   maskSelectors?: ?array<string>,
     *   maxHeight?: ?float,
     *   omitBackground?: ?bool,
     *   proxy?: ?value-of<ScreenshotDtoProxy>,
     *   quality?: ?float,
     *   reducedMotion?: ?bool,
     *   removeChatWidgets?: ?bool,
     *   removeCookieBanners?: ?bool,
     *   removeOverlays?: ?bool,
     *   responseFormat?: ?value-of<ScreenshotDtoResponseFormat>,
     *   scale?: ?value-of<ScreenshotDtoScale>,
     *   scrollDelay?: ?float,
     *   scrollPage?: ?bool,
     *   selector?: ?string,
     *   styles?: ?array<string>,
     *   timeout?: ?float,
     *   viewport?: ?ScreenshotViewportDto,
     *   waitForSelector?: ?string,
     *   waitUntil?: ?value-of<ScreenshotDtoWaitUntil>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blockAds = $values['blockAds'] ?? null;
        $this->clickSelector = $values['clickSelector'] ?? null;
        $this->clip = $values['clip'] ?? null;
        $this->colorScheme = $values['colorScheme'] ?? null;
        $this->cookies = $values['cookies'] ?? null;
        $this->delay = $values['delay'] ?? null;
        $this->device = $values['device'] ?? null;
        $this->disableAnimations = $values['disableAnimations'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->fullPage = $values['fullPage'] ?? null;
        $this->fullPageAlgorithm = $values['fullPageAlgorithm'] ?? null;
        $this->headers = $values['headers'] ?? null;
        $this->hideFixedElements = $values['hideFixedElements'] ?? null;
        $this->hideSelectors = $values['hideSelectors'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->maskColor = $values['maskColor'] ?? null;
        $this->maskSelectors = $values['maskSelectors'] ?? null;
        $this->maxHeight = $values['maxHeight'] ?? null;
        $this->omitBackground = $values['omitBackground'] ?? null;
        $this->proxy = $values['proxy'] ?? null;
        $this->quality = $values['quality'] ?? null;
        $this->reducedMotion = $values['reducedMotion'] ?? null;
        $this->removeChatWidgets = $values['removeChatWidgets'] ?? null;
        $this->removeCookieBanners = $values['removeCookieBanners'] ?? null;
        $this->removeOverlays = $values['removeOverlays'] ?? null;
        $this->responseFormat = $values['responseFormat'] ?? null;
        $this->scale = $values['scale'] ?? null;
        $this->scrollDelay = $values['scrollDelay'] ?? null;
        $this->scrollPage = $values['scrollPage'] ?? null;
        $this->selector = $values['selector'] ?? null;
        $this->styles = $values['styles'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
        $this->url = $values['url'];
        $this->viewport = $values['viewport'] ?? null;
        $this->waitForSelector = $values['waitForSelector'] ?? null;
        $this->waitUntil = $values['waitUntil'] ?? null;
    }
}
