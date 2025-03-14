import Tool from './pages/Tool'
import { createVNode, render } from 'vue';

Nova.booting((app/*, store*/) => {
  if (!app.config.globalProperties.$widgetsTool) {
    const container = document.createElement('div');
    container.id = 'nova-widgets';

    const vnode = createVNode(Tool);
    vnode.appContext = app._context;
    render(vnode, container);

    document.body.appendChild(container);
    app.config.globalProperties.$widgetsTool = {
      mounted: true,
      unmount: () => {
        render(null, container);
        container.remove();
      }
    };
  }
});