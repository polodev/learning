<?php
$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
echo $digit->format(2000);
