<?php

namespace Berrycrawl\Jobs\Types;

enum ListJobsRequestStatus: string
{
    case Pending = "PENDING";
    case Running = "RUNNING";
    case Completed = "COMPLETED";
    case Failed = "FAILED";
    case Cancelled = "CANCELLED";
}
