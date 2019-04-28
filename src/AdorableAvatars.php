<?php

namespace Sampic\LaravelAdorableAvatars;

use Illuminate\Contracts\Config\Repository as Config;

/**
 * Class AdorableAvatars
 * @package Sampic\LaravelAdorableAvatars
 */
class AdorableAvatars
{
    /**
     * Max size avatar
     */
    const MAX_SIZE = 512;

    /**
     * Base URL Adorable avatars
     */
    const URL_SECURE = "https://api.adorable.io/avatars";
    const URL_NOT_SECURE = "http://api.adorable.io/avatars";

    /**
     * The default size of the Adorable Avatars
     * @var int
     */
    private $defaultSize = null;

    /**
     * The default hash String the Adorable Avatars
     * @var boolean
     */
    private $hashString = null;

    /**
     * Use https or not
     * @var boolean
     */
    private $secureUrl = null;

    /**
     * AdorableAvatars constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        // Set default configuration values
        $this->defaultSize = $config->get('adorableavatars.size');
        $this->hashString = $config->get('adorableavatars.hash_string');
        $this->secureUrl = $config->get('adorableavatars.secure_url');
    }

    /**
     * @param string $string
     * @param int|null $size
     * @return string
     */
    public function src(string $string, int $size = null)
    {
        if (is_null($size)) {
            $size = $this->defaultSize;
        }

        if ($this->hashString) {
            $string = $this->getStringHash($string);
        }

        $size = max(1, min(self::MAX_SIZE, $size));

        return $this->getBuildUrl($string, $size);
    }

    /**
     * @param string $string
     * @param int $size
     * @return string
     */
    private function getBuildUrl(string $string, int $size): string
    {
        if ($this->secureUrl) {
            $url = self::URL_SECURE;
        } else {
            $url = self::URL_NOT_SECURE;
        }

        return $url.'/'.$size.'/'.$string;
    }

    /**
     * @param $string
     * @return string
     */
    private function getStringHash(string $string): string
    {
        return hash('sha1', strtolower(trim($string)));
    }
}
