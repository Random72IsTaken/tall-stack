<div align="center">
    بسم الله الرحمن الرحيم
</div>

# TALL Stack DevContainer

This is a [TALL stack](https://tallstack.dev/) (Laravel) [development environment](https://code.visualstudio.com/docs/remote/containers) (Docker) that I'd use to instantly start a new web application.

Until the customization feature is ready, this preset is clearly *opinionated*.

~ Inspired by the actual [tall](https://github.com/laravel-frontend-presets/tall/) preset!


## Core

### Services

1. [PHP](https://www.php.net/):8.1.8 (Port: [80](http://localhost:80))
   - [Xdebug](https://xdebug.org/):3.1.4 (Port: 9003)
2. [MySQL](https://www.mysql.com/):8.0.29 (Port: 3306)
3. [Redis](https://redis.io/):alpine (Port: 6379)
4. [Mailhog](https://github.com/mailhog/MailHog):latest (Port: 1025 | [8025](http://localhost:8025))
5. [MinIO](https://min.io/):latest (Port: 9000 | [8900](http://localhost:8900))

### Packages

- [Laravel Sail](https://github.com/laravel/sail) v1.15.0 (DevContainer)
- [TailwindCSS](https://tailwindcss.com) v3.1.6 ([Forms](https://github.com/tailwindlabs/tailwindcss-forms) and [Typography](https://tailwindcss.com/docs/typography-plugin) Plugins Installed)
- [Alpine.js](https://alpinejs.dev) v3.10.2 ([Focus](https://alpinejs.dev/plugins/focus) Plugin Installed)
- [Livewire](https://laravel-livewire.com) v2.10.6
- [Laravel](https://laravel.com) v9.20.0
- [Vite.js](https://vitejs.dev/guide/why.html#the-problems) v3.0.2 (**Livewire Supportive**)

### Opinionated (To Be Optional)

- [Pest](https://pestphp.com) v1.2.0 (Testing Framework)
- [Laravel Telescope](https://laravel.com/docs/telescope) v4.9.0 (Local Only)
- [Laravel Scout](https://laravel.com/docs/scout) v9.4.10 (**Database** Driver)
- [Google Fonts](https://github.com/spatie/laravel-google-fonts) v1.2.0
- [Media-Library](https://github.com/spatie/laravel-medialibrary) v10.4.1
- [Filament](https://filamentphp.com) v2.0.0 ([Admin](https://filamentphp.com/docs/admin), [Forms](https://filamentphp.com/docs/forms) and [Tables](https://filamentphp.com/docs/tables))
  - Including Spatie's [Media-Library](https://filamentphp.com/docs/2.x/spatie-laravel-media-library-plugin/installation) Plugin

### Modifications

<details><summary>Here are some core <strong>changes</strong> to the application structure:</summary>
<p>

- <details><summary>Environment Related</summary>
  <p>

  - Set a lot of essential and supportive VSC [`extensions`](https://github.com/GoodM4ven/tall-stack/blob/master/.devcontainer/devcontainer.json#L11) to be installed along the environment.

  - Included the following in version-control:

    - Essential [settings](.vscode/settings.json) for VSC and its extensions.

      - You should check them out. Especially the HTML attribute wrapping strategy, `wrapAttribute`, used by Blade Formatter extension.

    - Laravel Sail package in order for this whole thing to work **with only Docker installed**.

    - Xdebug dev-container VSC settings to start debugging easily.

  - Configured Vite.js to hot-reload the page upon file changes while preserving the state of Livewire components...

    > **Note**
    > If the change was done on the page itself though, which happens to contain an inlined Livewire component, then the state will be reset too in that case.

    > **Warning**
    > Please be aware that Vite's traffic is **blocked by Brave browser's Shield** feature. So make sure you click on it and disable it for `localhost`.

  </p>
  </details>

- <details><summary>Package Configuration</summary>
  <p>

  - MinIO is integrated to be the default Filesystem Disk. (`s3`)

  - Livewire's **temporary** upload filesystem is set to `local` though.

  - Livewire's **default `layout`** was set to the custom `master` layout we've created.

  - Some styles are defined in [`tailwind.config.js`](https://github.com/GoodM4ven/tall-stack/blob/master/tailwind.config.js) file, including:

    - Defined `content` for Blade file directories.

    - Added Filament colors: [`primary`, `success`, `warning` and `danger`].

    - Set the dark-mode to be `class`, and added a `dark-primary` colors.

      - (Click Laravel's logo in the home page! 😉)

  - Added `Mulish` as the default font via the Google Fonts package, and set its storage to `s3`.

  - Set `visibility` to `public` in Media-Libary's config file, and set the storage to `s3`.

  - Modified filament configurations as follows:

    - Enabled dark mode.

    - Hidden the 2 widgets from the default dashboard, and the default logo.

    - Added the default `favicon.ico` we've got for the app.

    - Set the default notification alignment to `top`/`right`.

  </p>
  </details>

- <details><summary>Project Structure</summary>
  <p>

  - Moved `lang` folder into `resources`.

  - A [Prettier](https://prettier.io/)'s configuration file is initialized in the project's root directory.

  - Added and registered a `Services/Helpers/general.php` helper file.

  - Added Laravel's logo as a cute favicon.

  - Designed a [`master`](https://github.com/GoodM4ven/tall-stack/blob/master/resources/views/components/layouts/master.blade.php) layout component, with `@stack()`s for various elements.

  - Redesigned a [`home`](https://github.com/GoodM4ven/tall-stack/blob/master/resources/views/home.blade.php) view to shout out for the TALL stack!

    - Replacing the default route with one for `home`, of course.

    - Pointing `RouteServiceProvider`'s `HOME` constant to `/`.

  - Organized the original environment variables and package-specific ones.

  </p>
  </details>

- <details><summary>Extra Modifications</summary>
  <p>

  - Added a [environment user](database/seeders/DatabaseSeeder.php#L18) to be generated by default.

    - Allowed this user to [access Filament](app/Models/User.php#L31) in production.

  - Added an environment variable, `PASSWORD_TIMEOUT`, which points to the setting in `config/auth.php` file.

  </p>
  </details>

</p>
</details>


## Customization

Soon, (in sha' Allah)...


## Execution

First you'd need [Docker](https://www.docker.com/products/docker-desktop/) set up; recommendedly hooked to an Ubuntu OS. If you're on Windows - for any weird reason, you can use [WSL2](https://laravel.com/docs/9.x/installation#getting-started-on-windows) to spin up [Ubuntu](https://apps.microsoft.com/store/detail/ubuntu/9PDXGNCFSCZV) inside it.

### Construction

Most of the following process is done with [VSC](https://code.visualstudio.com/); not PhpStorm. 😋

0. Get the template files using **either** of the two ways:

   - Use this package as a **template** and **clone** it locally.

   - Download the last [**release**](https://github.com/GoodM4ven/tall-stack/releases) or `master`'s source-code, open VSC, toggle its terminal into a bash session (Ubuntu's), then run following:

     ```bash
     cd ~/Code
     unzip ~/Downloads/tall-stack-x.x.x.zip -d ./
     mv tall-stack-x.x.x tall-stack
     ```

     - Replacing `tall-stack` with your project name; kebab-cased!

     - Assuming that there's a `Code` directory inside the `~` (home) directory, where projects are usually constructed.

     - Pretending that the downloaded source-code is in `~/Downloads` directory.

1. Duplicate the environment variables file and launch VSC in the project's directory:

   ```bash
   cd tall-stack
   cp .env.example .env
   code -r .
   ```

2. Open [`.devcontainer/devcontainer.json`](https://github.com/GoodM4ven/tall-stack/blob/master/.devcontainer/devcontainer.json) and set the `name` to your project name.

   - Go through the VSC extensions list and comment out what you don't like.

   - Consider supporting [PHP Intelephense](https://intelephense.com/) extension by purchasing their license.

3. Open the `.env` file and name your application in the following variables:

   ```ini
   APP_NAME="TALL Stack" # "Application Name"
   ENV_USER_NAME=Sail
   ENV_USER_EMAIL=sail@laravel.com
   ENV_USER_PASSWORD=password
   DB_DATABASE=tall_stack # application_name
   ```

4. Install the [Remote Development](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack) extension.

5. Run `Remote-Containers: Reopen in Container` from the command palette.

6. Toggle the terminal into a `bash` session (within the new container) and run the following commands:
   ```bash
   composer install
   php artisan tall-stack:build
   ```

   > **Note**<br>
   > The command will also ensure all the preset package's boilerplate are removed. And that the project now has Laravel's default structure; almost.

7. Navigate to MinIO's dashboard with: [`localhost:8900`](http://localhost:8900)

   - Sign in using `sail` and `password`.
   - Create a bucket named: `local`.
   - Set its `Access Policy` to `public`.

8. **Restart** the container by running `Remote-Containers: Rebuild Container` from the command palette.

9. Compile your front-end assets with Vite via NPM:
    ```bash
    npm run dev
    ```

    > **[Warning](www.google.com)**: You must ensure that Vite is running throughout development; an exception will be thrown for loading without it!

Now you can visit **[`http://localhost`](http://localhost)** and build something tall! 🙂

   - If you close the running VSC window, it will gracefully close down the container with it; after 10 seconds.

   - If you run the exact VSC window again, or if you open the project folder and `Remote-Containers: Reopen in Container`, the container will run with ease.

   - If you want to **debug** the application, just make sure you've got the Xdebug browser [extension](https://xdebug.org/docs/step_debug#browser-extensions) installed, head to the `Run and Debug` view, hit `F5` to start listening, put a break point in some PHP file, [activate](https://github.com/mac-cain13/xdebug-helper-for-chrome#hotkeys) the extension in the browser and head to [`localhost`](http://localhost).

     - If you're on Windows, there is an additional step shown in; follow the [Linux Host IP Configuration](https://laravel.com/docs/9.x/sail#debugging-with-xdebug) section in the docs.

### Destrcution

If you're done with the project and wish to **delete** it completely, do the following:

1. Delete the project containers:

   ```bash
   docker rm $(docker ps -a -q --filter name=tall-stack_)
   ```

   - Where `tall-stack` is the project name.

2. Use Docker Desktop to check for leftover images and volumes. (Both can be **inspected**)

3. Delete the main project's folder with privileges:

   ```bash
   sudo rm -rf ~/Code/tall-stack
   ```

> **Warning**<br>
> Missing one of these steps could easily ruin the building process of the development environment container, and resulting weird anomalies all around. Especially the folder in step 3.


## Development

**P**ull-**r**equests are extremely welcome... 😗👍🏻

### TODO

- [ ] Abstract away all the opinionated setup...
  - [x] Create a separate package for easier installation.
    - (The details are over [here](https://github.com/GoodM4ven/tall-stack-builder#TODOs))
  - [ ] Rework documentation.
- [ ] Integrate [Soketi](https://github.com/soketi/soketi) as an alternative for real-time [broadcasting](https://laravel.com/docs/9.x/broadcasting).
- [ ] Integrate [Cypress](https://github.com/laracasts/cypress) as a [front-end testing](https://cypress.io) framework.
- [ ] Write [Pest](https://pestphp.com) and [Cypress](https://cypress.io) tests, one day!
- [ ] Create a wiki page for VSC extensions and shortcuts.
- [ ] Create a wiki page for Laravel modules and working with sub-domains.

### Notes

- When updating packages, and **when you're inside the running container**, remove the `vendor/bin/sail` binary and then start updating.

  - If updating fails, **and you got out of the container**, you'd need to manually recover that file in order for the container to run again.

    ```bash
    cp ~/Code/tall-stack/vendor/laravel/sail/bin/sail ~/Code/tall-stack/vendor/bin/
    ```


## Credits

- The awesome framework creators.
- The original TALL Stack preset and their home [design](https://github.com/laravel-frontend-presets/tall/blob/master/stubs/default/resources/views/welcome.blade.php).
- TailwindCSS [Snippets](https://github.com/Pondorasti/tailwindcss-snippets) repository.
- [RhysLees](https://github.com/RhysLees) for the "interactive prompts" tip.

If you like the preset, please do 🌟 every repository linked around here; except this preset.

DO NOT STAR THIS PRESET! 😍


<div align="center">
   <br>والحمد لله رب العالمين
</div>
