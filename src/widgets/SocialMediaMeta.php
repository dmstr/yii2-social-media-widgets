<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2020 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\socialmediawidgets\widgets;

use yii\base\Widget;

/**
 * A yii2 widget which automatically sets needed html meta tags for sharing a page on social media platforms
 *
 * Currently supported social media platforms:
 * - Facebook
 * - Twitter
 * - Google Plus
 *
 * --- PROPERTIES ---
 *
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $url
 * @property string $twitterCard
 * @property string $siteName
 * @property string $twitterImageAlt
 *
 * @author Elias Luhr <e.luhr@herzogkommunikation.de>
 */
class SocialMediaMeta extends Widget
{
    /**
     * Here you enter the title to be displayed when a page is shared.
     *
     * @var string
     */
    public $title;

    /**
     * Here you enter a short, appealing description of the page content.
     *
     * @var string
     */
    public $description;

    /**
     * Here you enter the URL of an image to be displayed when sharing or likening your page.
     * The selected image must be at least 600x315px, ideally 1200x630px.
     * Facebook recommends an aspect ratio of 1.91:1.
     *
     * @var string
     */
    public $image;

    /**
     * This is where you define the URL to be shared. This ensures that the same URL is shared consistently and
     * prevents corruption by session IDs, search parameters or similar.
     *
     * @var string
     */
    public $url;

    /**
     * The card type, which will be one of “summary”, “summary_large_image”, “app” or “player”
     *
     * @var string
     */
    public $twitterCard;

    /**
     * Enter the official name of your site here.
     *
     * @var string
     */
    public $siteName;

    /**
     * A text description of the image conveying the essential nature of an image to users who are visually impaired.
     * Maximum 420 characters.
     *
     * @var string
     */
    public $twitterImageAlt;

    protected const ATTRIBUTE_PROPERTY = 'property';
    protected const ATTRIBUTE_NAME = 'name';


    public function run()
    {
        /** Essential meta tags */
        $this->registerMetaTag('og:title', static::ATTRIBUTE_PROPERTY, $this->title);
        $this->registerMetaTag('og:description', static::ATTRIBUTE_PROPERTY, $this->description);
        $this->registerMetaTag('og:image', static::ATTRIBUTE_PROPERTY, $this->image);
        $this->registerMetaTag('og:url', static::ATTRIBUTE_PROPERTY, $this->url);
        $this->registerMetaTag('twitter:card', static::ATTRIBUTE_NAME, $this->twitterCard ?: 'summary_large_image');

        /** Non-Essential, but recommended meta tags */
        $this->registerMetaTag('og:site_name', static::ATTRIBUTE_PROPERTY, $this->siteName);
        $this->registerMetaTag('twitter:image:alt', static::ATTRIBUTE_NAME, $this->twitterImageAlt);
    }

    /**
     * Register meta tag if content is not empty
     *
     * @param string $metaAttribute
     * @param string $attribute
     * @param string $content
     */
    protected function registerMetaTag(string $metaAttribute, string $attribute, ?string $content): void
    {
        if (empty($content) === false) {
            $this->view->registerMetaTag([
                $attribute => $metaAttribute,
                'content' => $content
            ], $metaAttribute);
        }
    }
}
