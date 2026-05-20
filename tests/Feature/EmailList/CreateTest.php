<?php

use Illuminate\Http\UploadedFile;

use function Pest\Laravel\{post, assertDatabaseHas};

pest()->group('email-list');

beforeEach(function () {
    login();
});

test('title should be required', function () {
    post(route('email-list.create'), [])
        ->assertSessionHasErrors(['title' => 'The title field is required.']);
});

test('title should have a max of 255 characters', function () {
    post(route('email-list.create'), ['title' => str_repeat('*', 256)])
        ->assertSessionHasErrors(['title' => 'The title field must not be greater than 255 characters.']);
});

test('file should be required', function () {
    post(route('email-list.create'), [])
        ->assertSessionHasErrors(['file' => 'The file field is required.']);
});

test('it should be able create an email list', function () {
    $data = [
        'title' => 'Email List Test',
        'file' => UploadedFile::fake()->createWithContent(
            'sample_names.csv',
            <<<'CSV'
                Name,Email
                Joe Doe,joe@doe.com
                CSV
        ),
    ];

    // Act
    $request = post(route('email-list.create'), $data);

    // Assert
    $request->assertRedirectToRoute('email-list.index');

    assertDatabaseHas('email_lists', [
        'title' => 'Email List Test',
    ]);

    assertDatabaseHas('subscribers', [
        'email_list_id' => 1,
        'name' => 'Joe Doe',
        'email' => 'joe@doe.com',
    ]);
});
