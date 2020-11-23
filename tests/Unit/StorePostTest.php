<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Requests\StorePost;

class StorePostTest extends TestCase
{
	/** @var StorePost */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new StorePost();
    }

    public function testRules()
    {
        $this->assertEquals([
                'title'            => 'required|unique:posts|max:100',
	            'description'      => 'required|max:1000',
	            'publication_date' => 'required|date',
            ],
            $this->subject->rules(),
        );
    }

    public function testAuthorize()
    {
        $this->assertTrue($this->subject->authorize());
    }
}
