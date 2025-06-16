<template>
  <div>
    <Card :bordered="false" dis-hover class="ivu-mt">
      <Form ref="form" :model="form" :label-width="100">
        <FormItem label="文件名">
          <Input v-model="form.file_name" />
        </FormItem>
        <FormItem label="文件地址">
          <Input v-model="form.file_url" />
        </FormItem>
        <FormItem label="预览地址">
          <Input v-model="form.preview_url" />
        </FormItem>
        <FormItem label="封面">
          <Input v-model="form.cover_url" />
        </FormItem>
        <FormItem label="标题(中文)">
          <Input v-model="form.title_cn" />
        </FormItem>
        <FormItem label="标题(英文)">
          <Input v-model="form.title_en" />
        </FormItem>
        <FormItem label="歌手(中文)">
          <Input v-model="form.artist_cn" />
        </FormItem>
        <FormItem label="歌手(英文)">
          <Input v-model="form.artist_en" />
        </FormItem>
        <FormItem label="所属专辑">
          <Input v-model="form.album" />
        </FormItem>
        <FormItem label="时长">
          <Input v-model="form.duration" />
        </FormItem>
        <FormItem label="BPM">
          <Input v-model="form.bpm" />
        </FormItem>
        <FormItem label="是否审核">
          <i-switch v-model="form.is_verified" :true-value="1" :false-value="0" />
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
      form: {
        file_name: '',
        file_url: '',
        preview_url: '',
        cover_url: '',
        title_cn: '',
        title_en: '',
        artist_cn: '',
        artist_en: '',
        album: '',
        duration: '',
        bpm: '',
        is_verified: 0
      }
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
