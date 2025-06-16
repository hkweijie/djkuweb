import request from '@/plugins/request';

// 音乐列表
export function musicLibraryListApi(params) {
    return request({
        url: 'music/library/list',
        method: 'get',
        params
    });
}

// 添加音乐
export function musicLibraryCreateApi(data) {
    return request({
        url: 'music/library/save',
        method: 'post',
        data
    });
}

// 更新音乐
export function musicLibraryUpdateApi(id, data) {
    return request({
        url: `music/library/update/${id}`,
        method: 'post',
        data
    });
}

// 删除音乐
export function musicLibraryDeleteApi(id) {
    return request({
        url: `music/library/delete/${id}`,
        method: 'delete'
    });
}
