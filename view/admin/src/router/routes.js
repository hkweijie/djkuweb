// +----------------------------------------------------------------------
// | CRMEB [ CRMEB赋能开发者，助力企业发展 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2021 https://www.crmeb.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed CRMEB并不是自由软件，未经许可不能去掉CRMEB相关版权
// +----------------------------------------------------------------------
// | Author: CRMEB Team <admin@crmeb.com>
// +----------------------------------------------------------------------
import index from './modules/index';
import product from './modules/product';
import order from './modules/order';
import user from './modules/user';
import supplier from './modules/supplier';
import echarts from './modules/echarts';
import setting from './modules/setting';
import settingPage from './modules/settingPage';
import agent from './modules/agent';
import finance from './modules/finance';
// import cms from './modules/cms';
import marketing from './modules/marketing';
import app from './modules/app';
import system from './modules/system';
import statistic from './modules/statistic';
import BasicLayout from '@/layouts/basic-layout';
import frameOut from './modules/frameOut';
import work from './modules/work';
import content from './modules/content';
import musicLibrary from './modules/musicLibrary';

/**
 * 在主框架内显示
 */

const frameIn = [
  {
    path: '/admin/',
    meta: {
      title: 'CRMEB'
    },
    redirect: {
      name: 'home_index'
    },
    component: BasicLayout,
    children: [
      {
        path: '/admin/system/log',
        name: 'log',
        meta: {
          title: '前端日志',
          auth: true
        },
        component: () => import('@/pages/system/log')
      },
      {
        path: '/admin/system/user',
        name: `systemUser`,
        meta: {
          auth: true,
          title: '个人中心'
        },
        component: () => import('@/pages/setting/user/index')
      },
      // 刷新页面 必须保留
      {
        path: 'refresh',
        name: 'refresh',
        hidden: true,
        component: {
          beforeRouteEnter(to, from, next) {
            next(instance => instance.$router.replace(from.fullPath));
          },
          render: h => h()
        }
      },
      // 页面重定向 必须保留
      {
        path: 'redirect/:route*',
        name: 'redirect',
        hidden: true,
        component: {
          beforeRouteEnter(to, from, next) {
            next(instance => instance.$router.replace(JSON.parse(from.params.route)));
          },
          render: h => h()
        }
      }
    ]
  },
  {
	path: `/admin/setting/system/create`,
	name: `system_create`,
	meta: {
	    auth: ['setting-system_create'],
	    title: '系统表单'
	},
	component: () => import('@/pages/setting/systemForm/create')
  },
  {
    path: '/admin/pages/diy',
    name: `setting_diy`,
    meta: {
      auth: ['admin-setting-pages-diy'],
      title: '首页装修'
    },
    component: () => import('@/pages/setting/devise/index')
  },
  {
    path: '/admin/pages/special/diy',
    name: `setting_special_diy`,
    meta: {
      auth: ['setting-diy-special-diy'],
      title: '专题页设计'
    },
    component: () => import('@/pages/setting/special/index')
  },
  {
    path: '/admin/widget.images/index.html',
    name: `images`,
    meta: {
      auth: true,
      title: '上传图片'
    },
    component: () => import('@/components/uploadPictures/widgetImg')
  },
  // 配合单打印
  {
    path: '/admin/supplier/order/distribution',
    name: `distribution`,
    meta: {
      auth: true,
      title: '配货单'
    },
    component: () => import('@/components/distribution')
  },
  {
    path: '/admin/widget.widgets/icon.html',
    name: `imagesIcon`,
    meta: {
      auth: true,
      title: '上传图标'
    },
    component: () => import('@/components/iconFrom/index')
  },
  {
    path: '/admin/store.StoreProduct/index.html',
    name: `storeProduct`,
    meta: {
      title: '选择商品'
    },
    component: () => import('@/components/goodsList/index')
  },
  {
    path: '/admin/video.shortVideo/index.html',
    name: `shortVideo`,
    meta: {
      title: '选择视频'
    },
    component: () => import('@/components/shortVideoList/index')
  },
  {
    path: '/admin/system.User/list.html',
    name: `changeUser`,
    meta: {
      title: '选择用户'
    },
    component: () => import('@/components/customerInfo/index')
  },
  {
    path: '/admin/widget.video/index.html',
    name: `video`,
    meta: {
      title: '上传视频'
    },
    component: () => import('@/components/uploadVideos/index')
  },
  index,
  product,
  order,
  user,
  supplier,
  echarts,
  setting,
  settingPage,
  agent,
  finance,
  marketing,
  app,
  system,
  statistic,
  work,
  musicLibrary,
  content
];

/**
 * 在主框架之外显示
 */
// const pre = 'kefu_';

const frameOuts = frameOut;

/**
 * 错误页面
 */

const errorPage = [
  {
    path: '/admin/other',
    name: 'other',
    meta: {
      title: 'other'
    },
    component: () => import('@/pages/system/error/other')
  },
  {
    path: '/admin/403',
    name: '403',
    meta: {
      title: '403'
    },
    component: () => import('@/pages/system/error/403')
  },
  {
    path: '/admin/500',
    name: '500',
    meta: {
      title: '500'
    },
    component: () => import('@/pages/system/error/500')
  },
  {
    path: '/admin/*',
    name: '404',
    meta: {
      title: '404'
    },
    component: () => import('@/pages/system/error/404')
  }

];

// 导出需要显示菜单的
export const frameInRoutes = frameIn;

// 重新组织后导出
export default [
  ...frameIn,
  ...frameOuts,
  ...errorPage
];
