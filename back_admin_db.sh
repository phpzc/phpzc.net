#!/bin/bash

# 导入 .env  环境变量
source ./.env
# 要备份的表
tables="vip_admin_menu vip_admin_permissions vip_admin_role_menu vip_admin_role_permissions vip_admin_role_users vip_admin_roles vip_admin_user_permissions vip_admin_users"
# 执行备份
mysqldump --host="${DB_HOST}" --port=${DB_PORT} --user="${DB_USERNAME}" --password="${DB_PASSWORD}" -t ${DB_DATABASE} ${tables} > database/admin.sql