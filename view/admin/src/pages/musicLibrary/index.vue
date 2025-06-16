<template>
  <div>
    <Card :bordered="false" dis-hover class="ivu-mt">
      <Button type="primary" @click="goAdd">添加音乐</Button>
      <Table :columns="columns" :data="list" :loading="loading" class="ivu-mt">
        <template slot-scope="{ row }" slot="action">
          <Button type="text" @click="goAdd(row.id)">编辑</Button>
          <Button type="text" @click="del(row.id)">删除</Button>
        </template>
      </Table>
    </Card>
  </div>
</template>
<script>
import { musicLibraryListApi, musicLibraryDeleteApi } from '@/api/musicLibrary';
export default {
  name: 'musicLibraryList',
  data() {
    return {
      list: [],
      loading: false,
      columns: [
        { title: 'ID', key: 'id', width: 60 },
        { title: '文件名', key: 'file_name' },
        { title: '标题(中文)', key: 'title_cn' },
        { title: '歌手(中文)', key: 'artist_cn' },
        { title: '时长', key: 'duration' },
        { title: '审核', key: 'is_verified' },
        { title: '操作', slot: 'action', width: 150 }
      ]
    }
  },
  methods: {
    getList() {
      this.loading = true;
      musicLibraryListApi({}).then(res => {
        this.list = res.data.list;
        this.loading = false;
      }).catch(() => (this.loading = false));
    },
    del(id) {
      this.$Modal.confirm({
        title: '提示',
        content: '确定删除该音乐吗？',
        onOk: () => {
          musicLibraryDeleteApi(id).then(() => {
            this.$Message.success('删除成功');
            this.getList();
          });
        }
      });
    },
    goAdd(id) {
      this.$router.push({ path: '/admin/musicLibrary/add' + (id ? '/' + id : '') });
    }
  },
  mounted() {
    this.getList();
  }
}
</script>
