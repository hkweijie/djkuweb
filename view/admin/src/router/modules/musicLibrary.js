import BasicLayout from '@/layouts/basic-layout';

const pre = 'musicLibrary_';

export default {
  path: '/admin/musicLibrary',
  name: 'musicLibrary',
  header: 'content',
  meta: { auth: ['admin-musicLibrary'] },
  component: BasicLayout,
  children: [
    {
      path: 'index',
      name: `${pre}index`,
      meta: { title: '音乐库', auth: ['admin-musicLibrary-index'] },
      component: () => import('@/pages/musicLibrary/index')
    },
    {
      path: 'add/:id?',
      name: `${pre}add`,
      meta: { title: '添加音乐', auth: ['admin-musicLibrary-add'] },
      component: () => import('@/pages/musicLibrary/add')
    }
  ]
};
