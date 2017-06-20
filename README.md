# fusible.wp-view

```php
// plugin

<?php
/**
 * Plugin Name: Fusible View
 * Plugin URI: https://github.com/fusible/fusible.wp-view/
 * Description: Aura View for WP
 * Version: 1.0.0
 * Author: Jake Johns
 * Author URI: http://jakejohns.new/
 * License: MIT License
 */

namespace Fusible\WpView;

if (!is_blog_installed()) {
    return;
}


(new Container)->getRender()->register();

```
