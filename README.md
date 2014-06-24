# Lightbox for phpBB 3.1

This extension adds the [Lightbox 2](http://lokeshdhakar.com/projects/lightbox2/) jQuery plugin to phpBB 3.1. It will resize posted images to a maximum set width and display them fullscreen in a Lightbox overlay effect.

[![Build Status](https://travis-ci.org/VSEphpbb/lightbox.png?branch=master)](https://travis-ci.org/VSEphpbb/lightbox)

## Requirements
* phpBB 3.1.0-b4 or higher
* PHP 5.3.3 or higher

Note: This extension is in development. Installation is only recommended for testing purposes and is not supported on live boards. This extension will be officially released following phpBB 3.1.0.

## Installation
1. [Download the latest release](https://github.com/VSEphpbb/lightbox/releases) and unzip it.
2. Copy the entire contents from the unzipped folder to `phpBB/ext/vse/lightbox/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Find Lightbox under "Disabled Extensions" and click `Enable`.

## Usage
1. Navigate in the ACP to `Attachment settings`.
2. Set `Create thumbnail` to `Yes`.
3. Set the `Maximum thumbnail width in pixel` to your desired resize width.
4. Click `Submit`.

## Uninstallation
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for Lightbox.
3. To permanently uninstall, click `Delete Data`, then delete the `lightbox` folder from `phpBB/ext/vse/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 - Matt Friedman (VSE)
