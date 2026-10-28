<?php

namespace Tests\Feature;

use App\Support\LandingContent;
use App\Support\UserGuide;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_landing_page_shows_challenges_and_workflow(): void
    {
        $response = $this->get('/')->assertOk();

        foreach (LandingContent::challenges() as $item) {
            $response->assertSee($item['problem']);
        }
        $response->assertSee('Dari ide sampai kelas dalam tujuh langkah')
            ->assertSee(route('guide'));
    }

    public function test_guide_page_covers_every_role(): void
    {
        $response = $this->get('/panduan')->assertOk();

        foreach (UserGuide::roles() as $role) {
            $response->assertSee($role['title'])->assertSee('id="'.$role['slug'].'"', false);
        }
    }

    public function test_guide_images_that_are_referenced_exist(): void
    {
        foreach (UserGuide::roles() as $role) {
            foreach ($role['images'] as $image) {
                if ($image['src']) {
                    $this->assertFileExists(public_path(ltrim($image['src'], '/')), $image['caption']);
                }
            }
        }
    }
}
