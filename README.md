Wordpress Settings Library
==========================

A library to easily create Wordpress settings fields, sections and pages in both themes and plugins.

###Version 1.0.0

###Requirements

- >= Wordpress 3.5
- >= PHP 5.3

#Documentation

##Installation

Download or clone this repository `https://github.com/dobbyloo/Wordpress-Settings-Library.git`

###Themes
- Copy the `settings` directory to your theme folder.
- Require library in `your-theme/functions.php` : `require_once(get_template_directory() . "/settings/load-theme.php");`

###Plugins
- Copy the `settings` directory to your plugin folder.
- Require library in `your-plugin/index.php` : `require_once(__DIR__  . "/settings/load-plugin.php");`

##Usage

See [Example Usage](settings/options/) in `settings/options/`

- Begin by creating an options configuration page. Name this what you like. `settings/options/your-configuration.php`
- Next, to keep things simple, namespace `your-configuration.php` to `PaintedCloud\WP\Settings`
- Initialize a page object for your settings. See [Creating Settings Pages](#creating-settings-pages).
- Initialize a settings array with section and field values. See [Configure Settings Sections](#configure-settings-sections).
- Initialize a `SectionFactory`, `OptionPageBuilderSingle`, or `OptionPageBuilderTabbed` depending on the type settings page you want to create. See [Creating Builder Objects](#creating-builder-objects).
- Require `your-configuration.php` into your project. Theme:`functions.php` or Plugin:`index.php`.

###Field Reference

See [Field Examples](settings/options/fields.php) in `settings/options/fields.php`

- `text` : Basic text field.
- `color` : Built in Wordpress color picker.
- `textarea` : Basic textarea field.
- `checkbox` : Basic checkbox field.
- `select` : Basic select drop down.
- `radio` : Basic radio option group.
- `upload` : Built in Wordpress media upload.
- `editor` : Built in Wordpress text editor.
- `multi` : Field groups that can be dynamically generated for list type data.

###Creating Settings Pages

Settings pages are container objects that hold information about the type of page you are creating.

The first parameter when initializing the page object is a `$menu_title`. This will be used to generate the page slug unless the `slug` key is set in the second parameter, which is an array of optional settings.

####Theme Options Page

```php
<?php namespace PaintCloud\WP\Settings;

$page = new Page('Theme Options');
```
####Settings Page

```php
<?php namespace PaintCloud\WP\Settings;

$page = new Page('My Settings', array('type' => 'settings'));
```

####Settings Page Section

This option allows you to insert your page sections onto one of the Wordpress default option pages.
Set the `slug` key to identify which option page you are selecting.

```php
<?php namespace PaintCloud\WP\Settings;

$page = new Page('My Settings', array('type' => 'settings', 'slug'=>'general'));
```

####Top Level Menu Page

```php
<?php namespace PaintCloud\WP\Settings;

$page = new Page('My Menu', array('type' => 'menu'));
```

####Sub Menu Page

```php
<?php namespace PaintCloud\WP\Settings;

$page = new Page('My Sub Menu', array('type' => 'submenu', 'parent_slug' => 'my-menu'));
```

###Configure Settings Sections

Settings sections are container objects that hold information about the section and the fields within.

####Basic Settings Sections
```php
<?php
$fields = array(); // Populated with field settings
$settings = array();
$settings['Section One'] = array( 'info' => 'Section one information.', 'fields' => $fields );
```

####Tabbed Settings Sections
```php
<?php
$fields = array(); // Populated with field settings
$settings = array('Tab One' => array());
$settings['Tab One']['Section One'] = array( 'info' => 'Section one information.', 'fields' => $fields );
```

###Creating Builder Objects

Builder objects utilize the container objects and the Wordpress api to register and render the settings pages.

####Section Factory
This is used when creating sections that will be appended to an existing admin page. You will still create a page container but the slug value should be provided.
```php
<?php namespace PaintCloud\WP\Settings;
$page = new Page('My Settings', array('type' => 'settings', 'slug'=>'general'));

$fields = array(); // Populated with field settings

$settings = array();

$settings['Section One'] = array( 'info' => 'Section one information.', 'fields' => $fields );

new SectionFactory( $page, $settings );
```
####Option Page Builder - Single
This is used when creating option pages that do not utilize tabs.
```php
<?php namespace PaintCloud\WP\Settings;
$page = new Page('Theme Options');

$fields = array(); // Populated with field settings

$settings = array();

$settings['Section One'] = array( 'info' => 'Section one information.', 'fields' => $fields );

new OptionPageBuilderSingle($page, $settings);
```

####Option Page Builder - Tabbed
This is used when creating option pages that utilize a tabbed layout.
```php
<?php namespace PaintCloud\WP\Settings;
$page = new Page('Theme Options');

$fields = array(); // Populated with field settings

$settings = array('Tab One' => array());

$settings['Tab One']['Section One'] = array( 'info' => 'Section one information.', 'fields' => $fields );

new OptionPageBuilderTabbed($page, $settings);
```