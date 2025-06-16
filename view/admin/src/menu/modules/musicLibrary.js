const pre = '/musicLibrary/';

export default {
    path: '/musicLibrary',
    title: '音乐库',
    header: 'content',
    icon: 'ios-musical-notes',
    children: [
        {
            path: `${pre}index`,
            title: '音乐列表'
        }
    ]
};
