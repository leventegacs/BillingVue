export const useAuth = () => {
    return computed(() => usePage().props.auth)
}
