<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

/** @see http://officeipsum.com/ */
$officeWisdom = "
How much bandwidth do you have get six alpha pups in here for a focus group no scraps hit the floor, we need this overall
 to be busier and more active. Deploy to production we are running out of runway yet cross functional teams enable out 
 of the box brainstorming we've got to manage that low hanging fruit and curate, but synergistic actionable. 
 Ladder up / ladder back to the strategy have bandwidth. Best practices post launch for globalize crisp ppt obviously 
 are we in agreeance get six alpha pups in here for a focus group.
";

// true
$stringContains = \str_contains(haystack: $officeWisdom, needle: 'active');

// false, because this is case sensitive
$stringStartWith = \str_starts_with(haystack: $officeWisdom, needle: 'how');

// true
$stringEndsWith = \str_ends_with(haystack: $officeWisdom, needle: 'focus group.');
