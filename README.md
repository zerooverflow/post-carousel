# Post Owl Carousel Wordpress plugin v0.9
Display posts from wp_query passed args using <a target="_blank" href="https://github.com/OwlCarousel2/OwlCarousel2">Owl Carousel 2</a> JS library

<h1>HOW TO USE</h1>

For Owl Carousel 2 options, see <a target="_blank" href="https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html">Owl Carousel 2 Documentation</a>

```php
$args = array(
    'post_status'   => 'publish',
    'post_type'     => 'post',
    'posts_per_page' => -1,
);

$carousel = new PostCarousel(
    array(
        "query_args" => $args,      //the WP_Query arguments
        "classes" => "my-slider",   //classes for carousel
        "template"  => ""           //custom template, not in use yet. Just customize carousel-template.php
    ),
    array(                          //owl carousel 2 options
        "loop"              => true,
        "margin"            => 0,
        "nav"               => true,
        "autoplay"          => true,
        "autoplayTimeout"   => 4000,
        "responsive"        => array(
            "0" => array(
                "items" => 1
            )
        )
    )
);
```
