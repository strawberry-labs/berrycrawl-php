<?php

namespace Berrycrawl\Types;

enum JobSummaryType: string
{
    case Crawl = "crawl";
    case Extract = "extract";
}
