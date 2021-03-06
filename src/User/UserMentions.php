<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Routing\UrlGenerator;

/**
 * Class UserMentions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UserMentions
{

    /**
     * The URL generator.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * Create a new UserMentions instance.
     *
     * @param UrlGenerator $url
     */
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    /**
     * Find all mentions in the text.
     *
     * @param $text
     * @return array
     */
    public function find($text)
    {
        preg_match_all('/(@\w+)/', $text, $matches);

        return array_map(
            function ($match) {
                return str_slug(substr($match, 1), '_');
            },
            array_unique(array_flatten($matches))
        );
    }

    /**
     * Replace mentions in the text with links.
     *
     * @param $text
     * @return string
     */
    public function linkify($text)
    {
        $url = str_replace(
            '__username__',
            '$2',
            route('anomaly.module.users::users.view', ['username' => '__username__'])
        );

        return preg_replace('/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '$1<a href="' . $url . '">@$2</a>', $text);
    }
}
