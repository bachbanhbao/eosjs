<pre style="width: 100%; height: 100%; margin:0px; "></pre>

<script src='eosjs-api.js'></script>
<script src='eosjs-jsonrpc.js'></script>
<script src='eosjs-jssig.js'></script>
<script>
  let pre = document.getElementsByTagName('pre')[0];
  const defaultPrivateKey = "EOS72mXDcVRoabcYXHPzoLwJejZHZfUGjUYJiDQhvokrLU5uWLrbz"; // bob
  const rpc = new eosjs_jsonrpc.JsonRpc('https://kylin.eoscanada.com');
  const signatureProvider = new eosjs_jssig.JsSignatureProvider([defaultPrivateKey]);
  const api = new eosjs_api.Api({ rpc, signatureProvider });

  (async () => {
    try {
      const result = await api.transact({
        actions: [{
            account: 'vnpittokennn',
            name: 'transfer',
            authorization: [{
                actor: 'bachbanhbao1',
                permission: 'active',
            }],
            data: {
                from: 'bachbanhbao1',
                to: 'tranxuanbach',
                quantity: '10 PIT',
                memo: '',
            },
        }]
      }, {
        blocksBehind: 3,
        expireSeconds: 30,
      });
      pre.textContent += '\n\nTransaction pushed!\n\n' + JSON.stringify(result, null, 2);
    } catch (e) {
      pre.textContent = '\nCaught exception: ' + e;
      if (e instanceof eosjs_jsonrpc.RpcError)
        pre.textContent += '\n\n' + JSON.stringify(e.json, null, 2);
    }
  })();
</script>
