<?php

class RespondToTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testRespondToHtml()
    {
        $articlesController = $this->newController(true);
        $htmlReponse = 'HTML response';

        $response = $articlesController->respondTo([
            'html' => $htmlReponse,
            'default' => 'JSON response'
            ]);

        $this->assertEquals($response, $htmlReponse);
    }

    public function testRespondToJson()
    {
        $articlesController = $this->newController(false);
        $jsonReponse = 'JSON response';

        $response = $articlesController->respondTo([
            'html' => 'HTML response',
            'default' => $jsonReponse
            ]);

        $this->assertEquals($response, $jsonReponse);
    }

    private function newController($wantsHtml)
    {
        return Mockery::mock('App\Http\Controllers\ArticlesController')
        ->makePartial()
        ->shouldReceive('wantsHtml')
        ->andReturn($wantsHtml)
        ->getMock();
    }
}
