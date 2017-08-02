# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

### Added

- 

### Changed

- 

### Fixed

- 

### Removed

- 

## [1.2.1] - 2017-08-02

### Fixed

- Fix output buffering priority.

## [1.2.0] - 2017-07-30

WordPress.org release.

## [1.1.1] - 2017-07-23

### Fixed

- Only ignore images for export (e.g., the generated ZIP file), see [#5](https://github.com/tfrommen/Dobby/issues/5).

## [1.1.0] - 2017-07-17

### Added

- Add `\tfrommen\Dobby\FILTER_THRESHOLD` to filter the minimum number of admin notices required for Dobby to take action, see [#4](https://github.com/tfrommen/Dobby/issues/4).
- Add ... ✨ MAGIC ✨.

### Changed

- Make Dobby reveal the captured admin notices once and for all instead of toggling them.
- Make Dobby pick up the according notice level based on what admin notices he captured—error wins over warning, otherwise it is an info—see [#3](https://github.com/tfrommen/Dobby/issues/3).

### Fixed

- Make Dobby also capture admin notices with only the `error` or `updated` class, see [#2](https://github.com/tfrommen/Dobby/issues/2).

## [1.0.1] - 2017-07-17

### Changed

- Move `load_plugin_textdomain()` call to where it actually is needed.

### Fixed

- Add missing `Text Domain` information in plugin header.
- Fix typos.

## [1.0.0] - 2017-07-16

Initial release.

----

[Unreleased]: https://github.com/tfrommen/Dobby/compare/v1.2.1...HEAD
[1.2.1]: https://github.com/tfrommen/Dobby/compare/v1.2.0...v1.2.1
[1.2.0]: https://github.com/tfrommen/Dobby/compare/v1.1.1...v1.2.0
[1.1.1]: https://github.com/tfrommen/Dobby/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/tfrommen/Dobby/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/tfrommen/Dobby/compare/v1.0.0...v1.0.1
