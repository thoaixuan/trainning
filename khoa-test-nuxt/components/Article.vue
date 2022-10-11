<template>
    <div class="col-lg-7 col-md-9 col-sm-auto">
        <div class="article" v-for="(item, x) in news" :key="x">
            <a :href="`/news/${item._id}`">
                <div class="article-top">
            <div class="content">
              <p class="h3 fw-bold">{{item.title}}</p>
              <p class="lh-base">{{item.summary}}</p>
            </div>
            <img class="rounded-circle" :src="item.image" />
          </div>
          <div class="article-bottom">
            <div class="d-flex align-items-center">
              <span class="mr-4">Kinh doanh & quản trị</span>
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                </path>
              </svg>
              <span class="ml-1 text-info">65</span>
            </div>

            <p>Hồ Quốc Tuấn</p>
          </div>
            </a>
          
        </div>
      </div>
</template>

<script>

export default {
    props:{
        news: {}
    }
}
</script>

<style>
.article {
  padding: 20px;
  border-bottom: 1px solid #e5e5e5;
  color: #4f4f4f !important;
}

.article:hover {
  cursor: pointer;
}

.article-top {
  display: flex;
  justify-content: space-between;
}

.article-top .content {
  width: 80%;
}

.article-top img {
  width: 80px;
  height: 80px;
}

.article-bottom {
  margin-top: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.author-wrapper {
  white-space: nowrap;
}
</style>