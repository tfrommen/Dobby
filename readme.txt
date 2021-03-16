=== Dobby ===
Contributors: tfrommen
Tags: admin, notices
Requires at least: 3.1.0
Tested up to: 5.7
Stable tag: 1.4.0
Requires PHP: 5.4

Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.

== Description ==

Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.

= Contribution =

To **contribute** to this plugin, please see its <a href="https://github.com/tfrommen/Dobby" target="_blank">**GitHub repository**</a>.

If you have a feature request, or if you have developed the feature already, please feel free to use the Issues and/or Pull Requests section.

Of course, you can also provide me with <a href="https://translate.wordpress.org/projects/wp-plugins/wp-dobby" target="_blank">translations</a> if you would like to use the plugin in another not yet included language.

== Installation ==

This plugin requires **PHP 5.4**.

1. Upload the `wp-dobby` folder to the `/wp-content/plugins/` directory on your web server.
1. Activate the plugin through the _Plugins_ menu in WordPress.
1. See only a single admin notice, if at all.

== Changelog ==

= 1.4.0 =
* Bump "Tested up to" header, see [issue #12](https://github.com/tfrommen/Dobby/issues/12).

= 1.3.0 =
* Fix dismissible notices not being able to get dismissed, see [issue #9](https://github.com/tfrommen/Dobby/issues/9).
* Add PHP_CodeSniffer, and adapt code.
* Pass custom selectors to JavaScript.

= 1.2.1 =
* Fix output buffering priority.

= 1.2.0 =
* WordPress.org release.

= 1.1.1 =
* Only ignore images for export (e.g., the generated ZIP file).

= 1.1.0 =
* Add `\tfrommen\Dobby\FILTER_THRESHOLD` to filter the minimum number of admin notices required for Dobby to take action.
* Add ... MAGIC.
* Make Dobby reveal the captured admin notices once and for all instead of toggling them.
* Make Dobby pick up the according notice level based on what admin notices he captured—error wins over warning, otherwise it is an info.
* Make Dobby also capture admin notices with only the `error` or `updated` class.

= 1.0.1 =
* Move `load_plugin_textdomain()` call to where it actually is needed.
* Add missing `Text Domain` information in plugin header.
* Fix typos.

= 1.0.0 =
* Initial release.
