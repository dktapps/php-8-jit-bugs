# php-8-jit-bugs

This repo is my personal test-bed for bugs found in OPcache's new JIT compiler in PHP 8.0.

It was put together quickly to be able to rapidly test for bugs found during PocketMine-MP testing, because some of them are ZTS- and platform-specific.
This repo tests using GitHub Actions, using PHP NTS (the default), on Windows and Ubuntu.

Any file in the samples/ directory will be run.
Those with a non-zero exit code will fail the build.
