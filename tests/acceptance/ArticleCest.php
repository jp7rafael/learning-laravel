<?php
use \Faker\Factory;

class ArticleCest
{
    public function _before(AcceptanceTester $I)
    {
        Artisan::call('db:truncate');
        $I->amOnPage('/articles');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function createAnValidArticle(AcceptanceTester $I)
    {
        $attributes = ['title' => 'New Article title',
                      'content' => 'The new text!'];

        $this->createAnArticle($I, $attributes);

        $I->waitForElement('table', 4);
        $I->see($attributes['title'], 'a');
    }

    public function createAnInvalidArticle(AcceptanceTester $I)
    {
        $attributes = ['title' => '32',
                       'content' => ''];

        $this->createAnArticle($I, $attributes);

        $I->see('The title must be at least 3 characters.', '.alert');
        $I->amOnPage('/articles');
        $I->dontSee($attributes['title'], 'a');
    }

    public function editAnArticleWithValidAttributes(AcceptanceTester $I)
    {
        $attributes = ['title' => Factory::create()->sentence($nbWords = 6),
                       'content' => 'The updated text!'];

        $this->editAnArticle($I, $attributes);

        $I->waitForElement('table', 4);
        $I->see($attributes['title'], 'a');
    }

    public function editAnArticleWithInvalidAttributes(AcceptanceTester $I)
    {
        $attributes = ['title' => 'Invalid article',
                       'content' => ''];

        $this->editAnArticle($I, $attributes);

        $I->see('The content field is required.', '.alert');
        $I->amOnPage('/articles');
        $I->dontSee($attributes['title'], 'a');
    }

    private function createAnArticle(AcceptanceTester $I, $attributes)
    {
        $I->haveAuthor();
        $I->click('New Article');
        $this->submitTheForm($I, $attributes);
    }

    private function editAnArticle(AcceptanceTester $I, $attributes)
    {
        $I->haveAuthor();
        $I->haveArticle();
        $I->amOnPage('/articles');
        $I->click('[href*=edit]');
        $this->submitTheForm($I, $attributes);
    }

    private function submitTheForm(AcceptanceTester $I, $attributes)
    {
        $I->waitForElement('form', 2);
        $I->fillField('form #title', $attributes['title'], 'a');
        $I->fillField('form #content', $attributes['content']);
        $I->click('form .btn-primary');
    }
}
