FROM node:18.12.0 AS node
FROM nginx:1.22 AS development

WORKDIR /workspace

ENV TZ=UTC

COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY ./infra/docker/nginx/*.conf /etc/nginx/conf.d/

FROM development AS deploy

COPY ./src /workspace
RUN npm install && npm run build
