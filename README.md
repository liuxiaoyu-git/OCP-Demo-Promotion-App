部署一个mysql
创建表AB

oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#discount --name=discount
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#buy1get1free --name=buy1get1free
oc expose svc discount --name=promotion

oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#statistic --name=statistic
oc expose svc statistic
