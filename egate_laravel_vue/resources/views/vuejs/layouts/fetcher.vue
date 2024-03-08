<!-- <template>
  <div class="mt-3">
    <KCard hasHover>
      <template #title>Hello World</template>
      <template #actions>
        <div v-if="isValidating">revalidating...</div>
      </template>
      <template #body>
        <div>
          <div v-if="error">{{ error }}</div>
          <div v-if="data === undefined && !error">Loading...</div>
          <div v-if="data">
            <pre>Response from page {{ page }}: <span class="appeared">{{ data }}</span></pre>
          </div>
        </div>
      </template>
    </KCard>
  </div>
</template>

<script>
import useSWRV from "swrv";

const sleep = ms => new Promise(r => setTimeout(r, ms));

async function fetcher(url) {
  await sleep(500);
  return "demo";
}

export default {
    data(){
        return{
            data:[],
        }
    },
  setup(props, { root }) {
    const { data:data, error, isValidating } = useSWRV(() => `https://api.e-gate.vn/api/news/getAll`, fetcher);
    return {
      data,
      error,
      isValidating
    };
  }
};
</script> -->
