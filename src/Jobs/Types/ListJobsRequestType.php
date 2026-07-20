<?php

namespace Berrycrawl\Jobs\Types;

enum ListJobsRequestType: string
{
    case Crawl = "crawl";
    case Extract = "extract";
}
