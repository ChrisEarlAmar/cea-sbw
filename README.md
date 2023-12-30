# CEA-SBW - Simple Blogging Website with Unsplash Image Search API Integration

CEA-SBW is a simple blogging website built with Laravel that integrates the Unsplash Image Search API for blog images.

## Features

-   **User Authentication:** Users can register, log in to create blog posts.
-   **Blog Creation:** Users can create new blog posts with a title, short description, content, and images fetched from Unsplash.
-   **Unsplash Image Integration:** The app integrates the Unsplash Image Search API to allow users to search and select images from Unsplash for their blog posts.
-   **Blog Management:** Users can delete their blog posts.

## Future Features

-   **User Authentication:** Users can manage and edit their profile.
-   **Blog Creation with Unplash Image Integration:** Users can select saved unsplash images instead of using locally stored images. (The blog currently uses a file input for the picture instead of radios using the saved unsplash images.)
-   **Blog Management:** Users can edit their blog posts.

## Setup

1. Locally save the repository in your device.

2. Modify the credentials in the environment, database and the Unsplash access key included.

3. Run database migrations and start the development server:

    php artisan migrate

    php artisan serve

4. Access the application in your web browser at `http://localhost:8000`.

## Usage

1. Register a new user or log in with existing credentials.
2. Create a new blog post by providing a title, short description, content, and selecting an image from Unsplash.
3. View, edit, or delete your blog posts from the dashboard.

## Contributing and License

This projecy is for educational purposes and is licensed under the MIT license. Feel free to use, modify and distribute this project.
