# Lightbox extension for phpBB

This extension adds the [Lightbox 2](http://lokeshdhakar.com/projects/lightbox2/) jQuery plugin to phpBB. It will resize posted images to a maximum set width and/or height and display them full-screen in a Lightbox overlay effect.

[![Build Status](https://github.com/iMattPro/lightbox/actions/workflows/tests.yml/badge.svg)](https://github.com/iMattPro/lightbox/actions)
[![codecov](https://codecov.io/gh/iMattPro/lightbox/branch/master/graph/badge.svg?token=YnBuha7JFN)](https://codecov.io/gh/iMattPro/lightbox)
[![Latest Stable Version](https://poser.pugx.org/vse/lightbox/v/stable)](https://www.phpbb.com/customise/db/extension/lightbox/)

## Minimum Requirements
* phpBB 3.2.0
* PHP 5.4

## Install
1. [Download the latest release](https://www.phpbb.com/customise/db/extension/lightbox/) and unzip it.
2. Unzip the downloaded release and copy it to the `ext` directory of your phpBB board.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Lightbox` under the Disabled Extensions list and click its `Enable` link.

## Usage
1. Navigate in the ACP to `Post settings -> Lightbox image resizing`.
2. Set the `Maximum image width in pixel` to your desired resize width.
3. Click `Submit`.

## Uninstall
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for Lightbox.
3. To permanently uninstall, click `Delete Data`, then delete the `lightbox` folder from `phpBB/ext/vse/`.

## License
[GNU General Public License v2](https://opensource.org/licenses/GPL-2.0)

© 2014 - Matt Friedman
