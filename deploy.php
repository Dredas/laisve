<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'lp');

// Project repository
set('repository', 'git@bitbucket.org:nerijusVit/lp.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);


// Hosts

host('64.225.75.63')
    ->user('deployer')
    ->set('deploy_path', '/home/deployer')->forwardAgent(false);
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

task('reload:php-fpm', function () {
    run('sudo /etc/init.d/php7.4-fpm restart');
});

after('deploy', 'reload:php-fpm');

