FROM node:alpine AS builder

WORKDIR /app

COPY package.json .
RUN npm install

COPY . .
RUN npm run build

FROM nginx:alpine

COPY --from=builder /app/dist/hs-frontend/* /usr/share/nginx/html/
COPY nginx.conf /etc/nginx/conf.d/default.conf