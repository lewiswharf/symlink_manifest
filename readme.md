#Symlink Manifest

The Symlink Manifest extension creates `manifest.dev` and `manifest.live` folders, and creates a symbolic link.

- Version: 0.1
- Author: Mark Lewis <mark@casadelewis.com>
- Build Date: 01 June 2011
- Requirements: Symphony 2.2

##Install

1. Upload the 'symlink_manifest' folder in this archive to your Symphony
   'extensions' folder.
2. Prepare
    - **Fresh install on dev**
        1. Ensure `manifest` folder exists.
    - **To live**
        1. Uninstall extension by selecting the "Symlink Manifest" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.
        2. Upload `manifest.live` and `manifest.dev` folders to live server. Rename `manifest.live` folder to `manifest`.
    - **To dev**
        1. Uninstall extension by selecting the "Symlink Manifest" item under Extensions, choose Uninstallfrom the with-selected menu, then click Apply.
        2. Download `manifest.live` and `manifest.dev` folders to dev server. Rename `manifest.dev` folder to `manifest`.
3. Enable extension by selecting the "Symlink Manifest" item under Extensions, choose Enable
   from the with-selected menu, then click Apply.

*NOTE: Fresh install will copy `maifest` folder to `manifest.dev` and `manifest.live` folders, with a symbolic link to `maifest.dev` folder*.

##History

- 0.1 Initial version (beta)