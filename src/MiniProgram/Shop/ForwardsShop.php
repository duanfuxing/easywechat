<?php
namespace EasyWeChat\MiniProgram\Shop;

/**
 * Class ForwardsMall
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 * @property \EasyWeChat\MiniProgram\Shop\AccountClient     $account
 * @property \EasyWeChat\MiniProgram\Shop\RegisterClient    $register
 * @property \EasyWeChat\MiniProgram\Shop\SpuClient         $spu
 * @property \EasyWeChat\MiniProgram\Shop\OrderClient       $order
 * @property \EasyWeChat\MiniProgram\Shop\DeliveryClient    $DeliveryClient
 * @property \EasyWeChat\MiniProgram\Shop\EcaftersaleClient $EcaftersaleClient
 * @property \EasyWeChat\MiniProgram\Shop\CouponClient      $coupon
 * @property \EasyWeChat\MiniProgram\Shop\FundsClient       $funds
 * @property \EasyWeChat\MiniProgram\Shop\WxPayClient       $wxpay
 * @property \EasyWeChat\MiniProgram\Shop\CommissionClient  $commission
 * @property \EasyWeChat\MiniProgram\Shop\ComplaintClient   $complaint
 * @property \EasyWeChat\MiniProgram\Shop\PromoterClient    $promoter
 */
class ForwardsShop
{
    /**
     * @var \EasyWeChat\Kernel\ServiceContainer
     */
    protected $app;

    /**
     * @param \EasyWeChat\Kernel\ServiceContainer $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param string $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        return $this->app["shop.{$property}"];
    }
}
