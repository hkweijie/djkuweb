<template>
  <div>
    <Card :bordered="false" dis-hover class="ivu-mt">
      <Form ref="form" :model="form" :label-width="80">
        <FormItem label="标题">
          <Input v-model="form.title" />
        </FormItem>
        <FormItem label="歌手">
          <Input v-model="form.artist" />
        </FormItem>
        <FormItem label="地址">
          <Input v-model="form.url" />
        </FormItem>
        <FormItem label="封面">
          <Input v-model="form.cover" />
        </FormItem>
        <FormItem label="状态">
          <i-switch v-model="form.status" :true-value="1" :false-value="0" />
        </FormItem>
        <FormItem>
          <Button type="primary" @click="submit">保存</Button>
        </FormItem>
      </Form>
    </Card>
  </div>
</template>
<script>
import { musicLibraryCreateApi, musicLibraryUpdateApi } from '@/api/musicLibrary';
export default {
  name: 'musicLibraryAdd',
  data() {
    return {
      form: { title: '', artist: '', url: '', cover: '', status: 1 }
    };
  },
  methods: {
    submit() {
      const id = this.$route.params.id;
      const api = id ? musicLibraryUpdateApi(id, this.form) : musicLibraryCreateApi(this.form);
      api.then(() => {
        this.$Message.success('保存成功');
        this.$router.back();
      });
    }
  },
  created() {
    const id = this.$route.params.id;
    if (id && this.$route.params.item) {
      this.form = { ...this.$route.params.item };
    }
  }
};
</script>
