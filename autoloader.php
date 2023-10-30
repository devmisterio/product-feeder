<?php
include_once("libs/helpers.php");

/**
 * Autoloader function for dynamically including PHP class files.
 *
 * This function attempts to include the class file based on the provided class name.
 * It searches in different directories (e.g., classes, libs, controllers, etc.) for the class file.
 * If the file is found, it is included.
 *
 * @param string $className The name of the class to load.
 *
 * @return void
 */
function autoloader(string $className): void
{
    // Define a list of directories to search for class files, including the root directory (null).
    $types = [TYPE_IS_CLASSES, TYPE_IS_LIBS, TYPE_IS_CONTROLLER, TYPE_IS_REPOSITORY, TYPE_IS_SERVICE, TYPE_IS_MIDDLEWARE, null];

    // Iterate through the list of directories and attempt to include the class file.
    foreach ($types as $type) {
        $filePath = resolve_path($className.".php", $type);

        // Check if the file exists in the specified directory.
        if (file_exists($filePath)) {
            include $filePath;
            return;
        }
    }
}

// Register the autoloader function to automatically load classes when needed.
spl_autoload_register("autoloader");
