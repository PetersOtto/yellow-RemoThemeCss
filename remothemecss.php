<?php
class YellowRemoThemeCss {
    const VERSION = "0.9.1";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle page content element
    // https://regex101.com/r/dVeb9U/1
    public function onParsePageOutput($page, $text) {
        $output = null;
        $themeName = strtolower($this->yellow->system->get("theme"));
        $htmlSource = $text;
        preg_match('/<link.+href=[\'"]((?<=href=")[^"]+\.*'.preg_quote($themeName).'\.css)[\'"].*>/i', $text, $themeCssFileLink);
        $output .= str_replace($themeCssFileLink[0],"<!-- The theme CSS link is not needed and was removed from the HTML source by the YellowRemoThemeCss extension. -->", $htmlSource);
        return $output;
    }
}