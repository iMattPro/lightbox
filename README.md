# Lightbox for phpBB 3.1

This extension adds the [Lightbox 2](http://lokeshdhakar.com/projects/lightbox2/) jQuery plugin to phpBB 3.1. It will resize posted images to a specified thumbnail size and display them fullscreen in an elegant Lightbox overlay effect.

Note: This extension is in development. Installation is only recommended for testing purposes and is not supported on live boards. This extension will be officially released following phpBB 3.1.0.

## Requirements
* phpBB 3.1-dev or higher
* PHP 5.3.3 or higher

## Usage
1. Navigate in the ACP to `Attachment settings`.
2. Set `Create thumbnail` to `Yes`.
3. Set the `Maximum thumbnail width in pixel` to your desired resize width.
4. Click `Submit`.

## Installation
You can install this on the latest copy of the develop branch ([phpBB 3.1-dev](https://github.com/phpbb/phpbb3)) by following the steps below:

**Manual:**

1. Copy the entire contents of this repo to `phpBB/ext/vse/lightbox/`
2. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
3. Click `Enable`.

**Git CLI:**

1. From the board root run the following git command:
`git clone https://github.com/VSEphpbb/lightbox.git phpBB/ext/vse/lightbox`
2. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
3. Click `Enable`.

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Extensions` and click `Disable`.

To permanently uninstall, click `Delete Data` and then you can safely delete the `/ext/vse/lightbox` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 - Matt Friedman (VSE)
