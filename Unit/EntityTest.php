<?php

use Drupal\social_post\Entity\SocialPost;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Tests\UnitTestCase;

/**
 * Defines Entity class.
 *
 * @Annotation
 */
class EntityTest extends UnitTestCase {

  /**
   * Define __construct function.
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests for class SocialPost.
   */
  public function testSocialPost() {
    $socialPost = $this->getMockBuilder(SocialPost::class)
                       ->disableOriginalConstructor()
                       ->getMock();

    $socialPost->expects($this->any())
               ->method('getProviderUserId')
               ->willReturn('drupalUser');

    $socialPost->expects($this->any())
               ->method('getPluginId')
               ->willReturn('implementerName');

    $socialPost->expects($this->any())
               ->method('getName')
               ->willReturn('providerName');

    $socialPost->expects($this->any())
               ->method('getId')
               ->willReturn('providerId');

    $socialPost->expects($this->any())
               ->method('getUserId')
               ->willReturn(123);

    $this->assertTrue(
          method_exists($socialPost, 'getProviderUserId'),
            'SocialPost does not implements getProviderUserId function/method'
    );
    $this->assertTrue(
          method_exists($socialPost, 'getPluginId'),
            'SocialPost does not implements getPluginId function/method'
    );
    $this->assertTrue(
          method_exists($socialPost, 'getName'),
            'SocialPost does not implements getName function/method'
    );
    $this->assertTrue(
          method_exists($socialPost, 'getId'),
            'SocialPost does not implements getId function/method'
    );
    $this->assertTrue(
          method_exists($socialPost, 'getUserId'),
            'SocialPost does not implements getUserId function/method'
    );

    $this->assertSame('drupalUser', $socialPost->getProviderUserId());
    $this->assertSame('implementerName', $socialPost->getPluginId());
    $this->assertSame('providerName', $socialPost->getName());
    $this->assertSame('providerId', $socialPost->getId());
    $this->assertSame(123, $socialPost->getUserId());
  }

}
