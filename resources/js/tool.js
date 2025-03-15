import Tool from './pages/Tool'
import { createVNode, render } from 'vue';

Nova.booting((app/*, store*/) => {
  if (!app.config.globalProperties.$widgetsTool) {
    Nova.request()
      .get('/nova-vendor/opscale-co/nova-widgets/widgets')
      .then(response => {
        const widgets = response.data;
        if (widgets && widgets.length > 0) {
          const headWidgets = widgets.filter(w => w.location === 'head');
          headWidgets.forEach(widget => {
            document.head.insertAdjacentHTML('beforeend', widget.html_code);
          });

          const bodyWidgets = widgets.filter(w => w.location === 'body');
          const container = document.createElement('div');
          container.id = 'nova-widgets';
          const vnode = createVNode(Tool, { widgets: bodyWidgets });
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
      })
      .catch(error => {
        console.error(`Error loading ${location} widgets:`, error);
      });
  }
});