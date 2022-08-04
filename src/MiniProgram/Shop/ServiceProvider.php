<?php

namespace EasyWeChat\MiniProgram\Shop;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['shop'] = function ($app) {
            return new ForwardsShop($app);
        };
        $app['shop.register'] = function ($app) {
            return new RegisterClient($app);
        };
        $app['shop.account'] = function ($app) {
            return new AccountClient($app);
        };
        $app['shop.spu'] = function ($app) {
            return new SpuClient($app);
        };
        $app['shop.order'] = function ($app) {
            return new OrderClient($app);
        };
        $app['shop.delivery'] = function ($app) {
            return new DeliveryClient($app);
        };
        $app['shop.aftersale'] = function ($app) {
            return new AftersaleClient($app);
        };
        $app['shop.coupon'] = function ($app) {
            return new CouponClient($app);
        };
        $app['shop.funds'] = function ($app) {
            return new FundsClient($app);
        };
        $app['shop.commission'] = function ($app) {
            return new CommissionClient($app);
        };
        $app['shop.wxpay'] = function ($app) {
            return new WxPayClient($app);
        };
        $app['shop.complaint'] = function ($app) {
            return new ComplaintClient($app);
        };
        $app['shop.promoter'] = function ($app) {
            return new PromoterClient($app);
        };
    }
}
