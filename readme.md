#Symlink Manifest

The Symlink Manifest extension creates `manifest.dev` and `manifest.live` folders, and creates a symbolic link. Thanks to [Rowan Lewis](http://rowanlewis.com/using-git-and-symphony-cms) for the idea.

- Version: 0.4
- Author: Mark Lewis <mark@casadelewis.com>
- Build Date: 13 August 2011
- Requirements: Symphony 2.2

##Install

1. Upload the 'symlink_manifest' folder in this archive to your Symphony
   'extensions' folder.
2. Prepare
    - **Fresh install on dev**
        1. Ensure `manifest` folder exists.
    - **To live**
        1. Upload `manifest.live` and `manifest.dev` folders to live server. Rename `manifest.live` folder to `manifest`.
        2. On live server, uninstall extension by selecting the "Symlink Manifest" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.
    - **To dev**
        1. Download `manifest.live` and `manifest.dev` folders to dev server. Rename `manifest.dev` folder to `manifest`.
        2. On dev server, uninstall extension by selecting the "Symlink Manifest" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.
3. Enable extension by selecting the "Symlink Manifest" item under Extensions, choose Enable
   from the with-selected menu, then click Apply.
	 
4. After installing for the first time, configure `manifest.live/config.php` to reflect configuration (i.e. database details) for the live server.

*NOTE: Fresh install will copy `manifest` folder to `manifest.dev` and `manifest.live` folders, with a symbolic link to `manifest.dev` folder*.

##Uninstall

1. Uninstall extension by selecting the "Symlink Manifest" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.

*NOTE: Uninstalling extension will leave `manifest.dev` and `manifest.live` folders, and delete symbolic link*.

##History

- 0.4 Add symlink as fall back to exec for better windows support.
- 0.3 Fixed bug where writing to `config.php` caused problem. Using `exec()` in place of `symlink()`.
- 0.2 Fixed symlink delete bug (beta)
- 0.1 Initial version (beta)