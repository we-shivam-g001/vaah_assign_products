let routes= [];

import dashboard from "./vue-routes-dashboard";
import customer from "./vue-routes-customers";
import product from "./vue-routes-products";
import user from "./vue-routes-users";

routes = routes.concat(dashboard);
routes = routes.concat(customer);
routes = routes.concat(product);
routes = routes.concat(user);

export default routes;
